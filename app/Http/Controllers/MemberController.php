<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\Member;
use App\Models\Membership;
use App\Models\Payement;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class MemberController extends Controller
{
    public function dashboard()
    {
        $members_count = Member::count();
        $memberships_count = Membership::count();
        $bundles_count = Bundle::count();

        $expired_memberships = Membership::where("end_date","<", Carbon::now()->toDateString())->get();
        $expired_memberships_count = $expired_memberships->count();
        return view("welcome",compact("members_count","memberships_count","bundles_count","expired_memberships_count"));
    }

    public function expired_memberships()
    {

        $memberships = Membership::where("end_date","<", Carbon::now()->toDateString())->simplePaginate(10);
        return view('show_membership', compact('memberships'));
    }

    public function search_for_expired_membership(Request $request)
    {
        $members = Member::whereAny(['first_name', 'last_name'], 'LIKE', '%' . $request->search . '%')->get('id');
        $memberships = Membership::whereIn('member_id', $members)->where("end_date","<", Carbon::now()->toDateString())->simplePaginate(10);

        return view('show_membership', compact('memberships'));
    }

    public function add_member()
    {

        return view("add-member");
    }

    public function add_new_member(Request $request)
    {

        $member = Member::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect('show_member');
    }

    public function show_member()
    {
        $members = Member::latest()->simplePaginate(10);
        $bundles = Bundle::all();
        return view("show-member", compact('members', 'bundles'));
    }

    public function edit_member($id)
    {
        $member = Member::findOrFail($id);

        return view('edit_member', compact('member'));
    }

    public function save_member($id)
    {
        $member = Member::findOrFail($id);

        $member->first_name = request()->fname;
        $member->last_name = request()->lname;
        $member->phone = request()->phone;
        $member->email = request()->email;
        $member->address = request()->address;
        $member->save();

        return redirect('show_member');
    }
    public function delete_member($id)
    {
        Member::findOrFail($id)->delete();

        return redirect('show_member');
    }

    public function search_for_member(Request $request)
    {
        $search = $request->search;
        $members = Member::whereAny(['first_name', 'last_name'], 'LIKE', '%' . $search . '%')->simplePaginate(2);
        // $members = Member::where('first_name','LIKE','%'.$search.'%')->get();
        $bundles = Bundle::all();
        return view("show-member", compact('members', 'bundles'));
    }

    public function add_membership()
    {
        $members = Member::all();
        $bundles = Bundle::all();
        return view('add_membership', compact('members', 'bundles'));
    }

    public function add_membership_to_member(Request $request, $id)
    {
        if ($id == 0) {
            $id = $request->member;
        }

        $bundle_duration = Bundle::find($request->bundle)->duration;
        $start_date = Carbon::now();

        //Check if the membership is already exist then update it start date//
        $membership = Membership::where('member_id', $id)->first();
        if ($membership) {
            $start_date = Carbon::createFromFormat('Y-m-d', $membership->end_date);
        }

        $end_date = '';

        $bundle = Bundle::find($request->bundle);
        $bundle_name = $bundle->name;

        switch ($bundle_name) {
            case 'month':
                $this->$end_date = $start_date->addMonth()->toDateString();
                break;
            case 'week':
                $this->$end_date = $start_date->addWeek()->toDateString();
                break;
            case 'day':
                $this->$end_date = $start_date->addDay()->toDateString();
                break;
            case '3 months':
                $this->$end_date = $start_date->addMonths(3)->toDateString();
                break;
            case 'year':
                $this->$end_date = $start_date->addYear()->toDateString();
                break;
        }

        if ($membership) {
            $final_start_date = $start_date->toDateString();

            $membership->end_date = $this->$end_date;
            $membership->bundle_id = $request->bundle;
            $membership->save();
        } else {
            $final_start_date = Carbon::now()->toDateString();

            Membership::create([
                'bundle_duration' => $bundle_duration,
                'member_id' => $id,
                'bundle_id' => $request->bundle,
                'start_date' => $final_start_date,
                'end_date' => $this->$end_date,
            ]);
        }

        $this->pay($id, $request->bundle);

        return redirect('show_membership');
    }

    public function pay($member_id, $bundle_id)
    {
        Payement::create([
            'member_id' => $member_id,
            'bundle_id' => $bundle_id,
            'amount' => Bundle::find($bundle_id)->price,
        ]);
    }

    public function show_membership()
    {
        $memberships = Membership::with('bundle', 'member')->simplePaginate(10);

        return view('show_membership', compact('memberships'));
    }

    public function add_bundle()
    {
        $bundles = Bundle::all();
        return view('add_bundle', compact('bundles'));
    }

    public function add_new_bundle(Request $request)
    {
        Bundle::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect()->back();
    }

    public function delete_bundle($id)
    {
        Bundle::find($id)->delete();

        return redirect()->back();
    }

    public function edit_bundle($id)
    {
        $bundle = Bundle::find($id);
        $bundles = Bundle::all();
        return view('edit_bundle', compact('bundle', 'bundles'));
    }

    public function save_bundle(Request $request, $id)
    {
        $bundle = Bundle::find($id);

        $bundle->name = $request->name;
        $bundle->price = $request->price;
        $bundle->save();

        return redirect('add_bundle');
    }


    public function search_for_membership(Request $request)
    {
        $members = Member::whereAny(['first_name', 'last_name'], 'LIKE', '%' . $request->search . '%')->get('id');

        $memberships = Membership::whereIn('member_id', $members)->simplePaginate(10);

        return view('show_membership', compact('memberships'));
    }

    public function delete_membership($id)
    {
        Membership::find($id)->delete();

        return redirect('show_membership');
    }

    public function renew_membership($id)
    {
        $membership = Membership::find($id);

        $start_date = Carbon::createFromFormat('Y-m-d', $membership->end_date);
        $end_date = '';

        $bundle_name = $membership->bundle->name;

        switch ($bundle_name) {
            case 'month':
                $this->$end_date = $start_date->addMonth()->toDateString();
                break;
            case 'week':
                $this->$end_date = $start_date->addWeek()->toDateString();
                break;
            case 'day':
                $this->$end_date = $start_date->addDay()->toDateString();
                break;
            case '3 months':
                $this->$end_date = $start_date->addMonths(3)->toDateString();
                break;
            case 'year':
                $this->$end_date = $start_date->addYear()->toDateString();
                break;
        }

        $membership->end_date = $this->$end_date;
        $membership->save();

        $this->pay($membership->member_id, $membership->bundle_id);

        return redirect()->back();
    }

    public function edit_membership($id)
    {

        $membership = Membership::with('member')->find($id);

        return view('edit_membership', compact('membership'));
    }

    public function save_membership($id, Request $request)
    {
        $membership = Membership::find($id);

        $membership->start_date = $request->start_date;
        $membership->end_date = $request->end_date;

        $membership->save();

        return redirect('show_membership');
    }

    public function show_payement()
    {
        $payements = Payement::with('member','bundle')->latest()->simplePaginate(10);

        return view('show_payement', compact('payements'));
    }

    public function setup()
    {
        User::create([
            'name' => 'samer',
            'email' => 'samer@live.com',
            'password' => 'password'
        ]);

        Bundle::create([
            'name' => 'month',
            'price' => '25$',
            'duration' => '31 days',
        ]);

        Bundle::create([
            'name' => 'week',
            'price' => '15$',
            'duration' => '7 days',
        ]);

        Bundle::create([
            'name' => 'day',
            'price' => '5$',
            'duration' => '1 day',
        ]);


        Member::create([
            'first_name' => 'samer',
            'last_name' => 'nasr',
            'phone' => '71090560',
            'address' => 'Baabdat'
        ]);

        Member::create([
            'first_name' => 'maria',
            'last_name' => 'fawaz',
            'phone' => '04003032',
            'address' => 'Bekaa'
        ]);


        return view('auth.login');
    }
}
