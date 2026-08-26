<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Output 1</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
            margin: 30px;
        }

        h1 {
            text-align: center;
        }

        fieldset {
            background-color: white;
            border: 1px solid #555;
            border-radius: 8px;
            padding: 20px;
        }

        legend {
            font-weight: bold;
            padding: 5px 10px;
        }

        table {
            width: 100%;
            max-width: 700px;
        }

        td {
            padding: 8px;
        }

        td:first-child {
            width: 180px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            max-width: 400px;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #aaa;
            border-radius: 4px;
        }

        textarea {
            height: 80px;
            resize: vertical;
        }

        .gender {
            width: auto !important;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #333;
            color: white;
        }

        input[type="reset"] {
            background-color: #ccc;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        input:focus,
        textarea:focus {
            border-color: #333;
            outline: none;
        }
    </style>
</head>

<body>

    <h1>PHP Output No. 1</h1>


    <fieldset>
        <legend>This form uses GET request</legend>

        <form action="redirect.php" method="GET">

            <table>

                <tr>
                    <td>First Name</td>
                    <td>
                        <input
                            type="text"
                            name="fname"
                            placeholder="Enter First Name"
                            pattern="[A-Za-z ]+"
                            required
                        />
                    </td>
                </tr>

                <tr>
                    <td>Middle Name</td>
                    <td>
                        <input
                            type="text"
                            name="mname"
                            placeholder="Enter Middle Name"
                            pattern="[A-Za-z ]+"
                            required
                        />
                    </td>
                </tr>

                <tr>
                    <td>Last Name</td>
                    <td>
                        <input
                            type="text"
                            name="lname"
                            placeholder="Enter Last Name"
                            pattern="[A-Za-z ]+"
                            required
                        />
                    </td>
                </tr>

                <tr>
                    <td>Age</td>
                    <td>
                        <input
                            type="number"
                            name="age"
                            placeholder="Enter Age"
                            min="1"
                            max="120"
                            required
                        />
                    </td>
                </tr>

                <tr>
                    <td>Gender</td>
                    <td>
                        <input
                            type="radio"
                            name="gender"
                            value="Male"
                            required
                        /> Male

                        <input
                            type="radio"
                            name="gender"
                            value="Female"
                        /> Female
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input
                            type="email"
                            name="email"
                            placeholder="Enter Email"
                            required
                        />
                    </td>
                </tr>

                <tr>
                    <td>Address</td>
                    <td>
                        <textarea
                            name="address"
                            placeholder="Enter Address"
                            required
                        ></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Contact Number</td>
                    <td>
                        <input
                            type="tel"
                            name="contact"
                            placeholder="09XXXXXXXXX"
                            pattern="[0-9]{11}"
                            maxlength="11"
                            required
                        />
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Submit Data">
                        <input type="reset" value="Cancel">
                    </td>
                </tr>

            </table>

        </form>
    </fieldset>



    <fieldset style="margin-top: 20px">

        <legend>This form uses POST request</legend>

        <form action="redirect.php" method="POST">

            <table>

                <tr>
                    <td>First Name</td>
                    <td>
                        <input
                            type="text"
                            name="fname"
                            placeholder="Enter First Name"
                            pattern="[A-Za-z ]+"
                            required
                        />
                    </td>
                </tr>

                <tr>
                    <td>Middle Name</td>
                    <td>
                        <input
                            type="text"
                            name="mname"
                            placeholder="Enter Middle Name"
                            pattern="[A-Za-z ]+"
                            required
                        />
                    </td>
                </tr>

                <tr>
                    <td>Last Name</td>
                    <td>
                        <input
                            type="text"
                            name="lname"
                            placeholder="Enter Last Name"
                            pattern="[A-Za-z ]+"
                            required
                        />
                    </td>
                </tr>

                <tr>
                    <td>Age</td>
                    <td>
                        <input
                            type="number"
                            name="age"
                            placeholder="Enter Age"
                            min="1"
                            max="120"
                            required
                        />
                    </td>
                </tr>

                <tr>
                    <td>Gender</td>
                    <td>
                        <input
                            type="radio"
                            name="gender"
                            value="Male"
                            required
                        /> Male

                        <input
                            type="radio"
                            name="gender"
                            value="Female"
                        /> Female
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input
                            type="email"
                            name="email"
                            placeholder="Enter Email"
                            required
                        />
                    </td>
                </tr>

                <tr>
                    <td>Address</td>
                    <td>
                        <textarea
                            name="address"
                            placeholder="Enter Address"
                            required
                        ></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Contact Number</td>
                    <td>
                        <input
                            type="tel"
                            name="contact"
                            placeholder="09XXXXXXXXX"
                            pattern="[0-9]{11}"
                            maxlength="11"
                            required
                        />
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Submit Data">
                        <input type="reset" value="Cancel">
                    </td>
                </tr>

            </table>

        </form>
    </fieldset>

</body>
</html>