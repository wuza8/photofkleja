<!DOCTYPE HTML>
<HTML>
<head>
    <title> Instalator PhotoFklejki </title>
</head>

<body>

create table zdjecia(ID int primary key AUTO_INCREMENT not null, filename text, UserID int);
create table uzytkownicy(ID int primary key not null AUTO_INCREMENT, username text, password text);
</body>
</HTML>