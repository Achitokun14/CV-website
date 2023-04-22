


CREATE database all_users;

use all_users;

DROP TABLE users;

DROP TABLE CV;




show TABLES;

CREATE Table users (
    users_id int PRIMARY KEY AUTO_INCREMENT,
    username char(15) not NULL UNIQUE,
    email char(30) not NULL UNIQUE,
    passwords char(32) not NULL,
    sign_stamp TIMESTAMP
);

CREATE TABLE Picture (
    picture_id int PRIMARY KEY AUTO_INCREMENT,
    pic_name CHAR(100) NOT NULL,
    pic_file LONGBLOB NOT NULL,
    pic_type CHAR(10) NOT NULL,
    pic_date TIMESTAMP
);

CREATE TABLE CV (
    cv_id int PRIMARY KEY AUTO_INCREMENT,
    cv_name CHAR(20) NOT NULL,
    cv_email CHAR(30) NOT NULL,
    cv_phone CHAR(14) NOT NULL,
    cv_adr CHAR(20) NOT NULL,
    summary TEXT NOT NULL,
    education TEXT NOT NULL,
    experience TEXT NOT NULL,
    skills TEXT NOT NULL,
    picture_id int NOT NULL,
    users_id int NOT NULL,
    fill_stamp TIMESTAMP,
    FOREIGN KEY (users_id) REFERENCES users(users_id) on update CASCADE on delete CASCADE,
    FOREIGN KEY (picture_id) REFERENCES picture(picture_id) on update CASCADE on delete CASCADE
);



DESCRIBE users;

DESCRIBE CV;

INSERT INTO users(username,email,passwords) 
VALUES ("AbdElKader","Abd2668@live.fr",MD5("123456"));

SELECT users_id FROM users WHERE 

INSERT INTO Picture(pic_name,pic_file,pic_type) 
VALUES ("gggggg.png","01111010010100010010","png");

INSERT INTO CV(cv_name,cv_email,cv_phone,cv_adr,summary,education,experience,skills,picture_id,users_id) VALUES ("Yassin Zahiri","yas3Zah1@gmail.com","+212798685982","takadom N36 Rabat","A highly motivated and skilled software developer with over 5 years of experience in the industry. Strong expertise in Java, Python, and C++, as well as experience with web development using HTML, CSS, and JavaScript. Excellent problem-solving and communication skills, with a proven track record of delivering high-quality software products on time and within budget","Bachelor of Science in Computer Science, XYZ University, 2012-2016","Software Developer, ACME Inc., 2018-present","Java,Python,C++,HTML,CSS,JavaScript",1,1);


select * FROM users;
select * FROM users WHERE username="AbdElKader" and passwords=MD5("123456");
select * FROM CV;

INSERT INTO cv(cv_name,cv_email,cv_phone,cv_adr,summary,education,experience,skills,picture_id,users_id) VALUES ('achraf','potato@gmail.com','456123789','blabla','blabla blabla blabla blabla blabla blabla','blabla blabla blabla blabla blabla blabla','blabla blabla blabla blabla blabla blabla','blabla blabla blabla blabla blabla blabla','2','1');

INSERT INTO cv(cv_name,cv_email,cv_phone,cv_adr,summary,education,experience,skills,picture_id,users_id) VALUES ('$Name','$Email','$Phone','$Address','$Summary','$Education','$Experience','$Skills','$PicId','$user_id');

SELECT cv_name,cv_email,cv_phone,cv_adr,summary,education,experience,skills,picture_id FROM cv WHERE users_id = '$user_id';

SELECT pic_name,pic_file FROM Picture WHERE picture_id ='$result['picture_id']';

SELECT cv_name,cv_email,cv_phone,cv_adr,summary,education,experience,skills,picture_id FROM cv WHERE users_id = '$user_id' ORDER BY cv_id DESC LIMIT 1;


'Name,Email,Summary,Creation time,PDF,Modify,Delete'

UPDATE cv SET cv_name="$Name",cv_email="$Email",cv_phone="$Phone",cv_adr="$Address",summary="$Summary",education="$Education",experience="$Experience",skills="$Skills",picture_id="$PicId" WHERE users_id = '$user_id' and cv_id="$cv_id";



SELECT cv_name,cv_email,summary,fill_stamp FROM cv WHERE users_id = '$user_id' ORDER BY fill_stamp DESC;



