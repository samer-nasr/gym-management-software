<style>
    body {
        background-image: url('/images/img.jpg');
        background-size: 100%;
    }

    .title {
        text-align: center;
        font-size: 2em;
        font-weight: bold;
    }

    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 30px;
        border: 2px solid black;
        border-radius: 12px 0;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5),
            -5px -5px 10px rgba(255, 255, 255, 0.7);
    }

    .membership_form
    {
        width: 60%;
    }

    .bundle_form
    {
        width: 60%;
    }


    .form-container {
        border: none;
    }

    .submit {
        width: 30%;
        border: 2px solid black;
        border-radius: 12px 0;
        padding: 10px;
        font-weight: bold;
        font-size: 1.2em;
        background-color: blue;
    }

    .submit:hover {
        opacity: 0.8;
    }

    .form-title {
        font-size: 1.5em;
        font-weight: bold;
    }

    label {
        font-weight: bold;
        font-size: 1.2em;
    }

    .input-style {
        width: 300px;
        margin: 10px;
        opacity: 0.7;
        background-color: lightgrey;
    }

    .input-style:hover {
        opacity: 1;
    }

    tr {
        border: 1px solid black;
    }

    th,
    td {
        text-align: center;
        font-size: 1.3em;
        padding: 10px;
    }

    tr th {
        background-color: lightgrey;
        opacity: 0.8;
    }

    td {
        font-weight: bold;
    }

    th {
        width: 10em;
        font-weight: bolder;
    }

    .column-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .search-button {
        font-weight: bold;
        font-size: 1.2em;
        border: 1px solid black;
        padding: 5px;
        margin: 0;
        background-color: lightblue;
    }

    .search-button:hover {
        opacity: 0.8;
    }

    .search-form {
        display: flex;
        align-items: center;
        justify-content: space-around;
        margin-bottom: 10px;
    }

    .buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }


    .delete-button {
        background-color: red;
        border: 1px solid black;
        border-radius: 12px;
        padding: 5px;
        margin-right: 3px;
    }

    .delete-button:hover {
        opacity: 0.8;
    }

    .edit-button {
        background-color: blue;
        border: 1px solid black;
        border-radius: 12px;
        padding: 5px;
        margin-right: 3px;
    }

    .edit-button:hover {
        opacity: 0.8;
    }

    option {
        text-align: center;
        font-weight: bold;
        font-size: 1.3em;
    }

    .container {
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        width: 100vw;
        height: 100vh;
    }

    .items-container {
        display: flex;
        justify-content: space-around;
        width: 100vw;
        height: 40vh;
    }

    .item {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 25%;
        height: 40%;
        margin-top: 5%;
        border: 2px solid black;
        border-radius: 12px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5),
            -5px -5px 10px rgba(255, 255, 255, 0.7);
        background-color: lightgrey;
        opacity: 0.8;
    }

    .item:hover {
        opacity: 1;
    }

    .item .item-title {
        font-size: 1.5rem;
        font-weight: bold;
        cursor: default;
    }

    .item .item-value {
        font-size: 1.1rem;
        font-weight: 900;
        color: rgb(4, 4, 65);
        cursor: default;
    }

    .home_title {
        font-size: 48px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        color: #f8b400;
        letter-spacing: 4px;
        margin: 0;
        padding: 20px;
        background: rgba(0, 0, 0, 0.7);
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);

    }

    .logo-center
    {
        display: flex;
        justify-content: center;
    }
</style>
