<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            animation: rainbow 5s linear infinite alternate;
        }

        @keyframes rainbow {
            0% {
                background-color: #ff0000;
            }

            25% {
                background-color: #ff7f00;
            }

            50% {
                background-color: #ffff00;
            }

            75% {
                background-color: #00ff00;
            }

            100% {
                background-color: #0000ff;
            }
        }

        h2 {
            text-align: center;
            color: #333;
            animation: shake 0.5s infinite alternate;
        }

        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(-5px);
            }

            100% {
                transform: translateX(-5px);
            }
        }

        #signupForm {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            animation: pulse 1s infinite alternate;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        table {
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h2>Signup Form</h2>
    <div id="signupForm">
        <form>
            <table>
                <tr>
                    <td><label for="fname">First Name:</label></td>
                    <td><input type="text" id="fname" name="fname"></td>
                </tr>
                <tr>
                    <td><label for="lname">Last Name:</label></td>
                    <td><input type="text" id="lname" name="lname"></td>
                </tr>
                <tr>
                    <td><label for="age">Age:</label></td>
                    <td><input type="text" id="age" name="age"></td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td><input type="text" id="address" name="address"></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="text" id="email" name="email"></td>
                </tr>
            </table>
            <button type="submit" id="submit">Sign Up</button>
        </form>
    </div>
    <script>

        document.getElementById("submit").addEventListener("click", function (event) {
            const fName = document.getElementById("fname").value;
            const lName = document.getElementById("lname").value;
            const age = document.getElementById("age").value;
            const address = document.getElementById("address").value;
            const email = document.getElementById("email").value;
            let nameRegex = /^[a-zA-Z]+$/;
            let ageRegex = /^[0-9]+$/;
            let addressRegex = /^[a-zA-Z0-9\s\-\.]+$/
            let emailRegex = /^[a-zA-z0-9\@\.]+$/;

            if (!nameRegex.test(fName)) {
                event.preventDefault();
                alert("Wrong format for first name");
            }

            if (!nameRegex.test(lName)) {
                event.preventDefault();
                alert("Wrong format for last name");
            }

            if (!ageRegex.test(age)) {
                event.preventDefault();
                alert("Wrong age format");
            }

            if (!addressRegex.test(address)) {
                event.preventDefault();
                alert("Wrong address format");
            }
            if (!emailRegex.test(email)) {
                event.preventDefault();
                alert("Wrong email format");
            }
            console.log(fName);
            console.log(lName);
            console.log(age);
            console.log(address);
            console.log(email);




            let myJsonData = {
                name: fName,
                surname: lName,
                age: age,
                address: address,
                email: email
            };
            let officialData = JSON.stringify(myJsonData);
            const url = 'login.php';

            fetch(url,{
                method : "POST",
                headers :{
                    'Content-Type':"application/json"
                },
                body : officialData
            }).then(response=>{
                if(!response.ok){
                    throw new Error("Network response was not okay");
                }else{
                    return response.json();
                }
            }).then(data=>{
                console.log("Successfully uploaded");
            }).catch(error=>{
                console.log("Some error has occured",error);
            });
        });









    </script>
</body>

</html>