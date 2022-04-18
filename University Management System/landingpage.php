<?php

//starting session and checking if user logged in already  if not than redirecting to signin

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: signin.php");
}
//accessing profile pic from db
$profile_pic="";
$user_pic=$_SESSION['picsource'];
$default_pic= "student/default.jpg";
//checking if picture exist in db
if (file_exists($user_pic)){
    $profile_pic=$user_pic;
}
else{
    $profile_pic=$default_pic;//using default picture if user didn't uploadedany
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- this title is temporary -->
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/landingpage.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
    <!-- different css pages can be made for each element and linked so as to improve readability  -->
    <div id="navigationbar">
        <ul>
            <li><a href="index.php"><img src="img/logo.png" alt="Logo"></a></li>
            <li><a href="landingpage.php">Home</a></li>
            <li><a href="timetable.php">Time Table</a></li>
            <li><a href="examination.html">Examinations</a></li>
            <li><a href="changepass.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li class="nav_item profview"><img class="pic " src="<?php echo$profile_pic?>"  alt=""><a class="uname" href="landingpage.php"><?php echo$_SESSION['uname']  ?></a></li>
        </ul>
    </div>
    <div class="container">
        <div class="item" id="profile">
            <div class="head">Profile</div>
            <div class="itemCont itemContP">
            
                <!-- <img id="Profile_photo" src="userprofile.png" alt=""> -->
                <img id="Profile_photo" src="<?php echo$profile_pic ?>" alt="User Profile picture">
                <div class="contentProfile">Reistration Number:
                    <div class="contentA"><?php echo$_SESSION['regno']  ?></div>
                </div>
                <div class="contentProfile">Name:
                    <div class="contentA"><?php echo$_SESSION['fname']  ?></div>
                </div>
                <div class="contentProfile">Course:
                    <div class="contentA">Btech. CSE</div>
                </div>
                <div class="contentProfile">Section:
                    <div class="contentA">K21PP</div>
                </div>
                <div class="contentProfile">Semester:
                    <div class="contentA">2nd</div>
                </div>
                <div class="contentProfile">Admission on:
                    <div class="contentA">11-21-2022</div>
                </div>
                <div class="contentProfile">Valid till:
                    <div class="contentA">11-21-2025</div>
                </div>
                <img id="wlogo" src="img/widelogo.png" alt="College Name">
            </div>

        </div>

        <div class="item">
            <div class="head">Anouncements</div>
            <div class="itemCont">
                <ul>
                    <li><b>Compulsory Submission of Anti Ragging Form </b><br>
                        Dear Student, With reference to the notification received from UGC regarding implementation of
                        Anti Ragging Regulations, you are required to submit your details at either of the two
                        designated websites, namely www.antiragging.in and www.amanmovement.org.

                        After submitting the required details, you will receive an E-mail with your Anti Ragging
                        Undertaking Reference number and a web link. You are mandatorily required to forward the web
                        link to antiragging@lpu.co.in.

                        The step-by-step guide to fill the online anti ragging affidavit is also attached herewith. In
                        case of any queries, please feel free to contact LPU Helpline at +91-1824-520236 from 10:00 am
                        to 4:00 pm on weekdays.
                    </li>
                    <li><b>Workshop on Go-Kart </b><br>
                        Astrionics- A Student chapter under Student Research and Project Cell is going to conduct a
                        workshop on “GO-KART''. A rare opportunity for the students to understand the basics and various
                        departments in GO-KART. Do you think Go-Kart and a normal car are the same in terms of
                        performance? The answer is NO! There are major differences in terms of design , purpose ,
                        braking , steering. Want to know about the differences in detail, these will be taught in the
                        workshop.
                    </li>
                    <li><b> Recruitment Drive for Student Chapter-Game Scape </b><br>
                        For the first time Student Research and Project Cell-Student Welfare Wing is initializing a
                        student chapter which mainly focused on game designing and developing titled "Game-Scape". So
                        here's an opportunity for everyone to join us and expand our team for further project works ,
                        webinars, bootcamps , events and many more . Our aim is to provide a better place for
                        enthusiastic minds of designing and developing students to lift up the bar of this field.

                        Eligibility

                        -Must be a Student of LPU

                        -They can be of any department as they just have to be passionate towards game making.Good at
                        teamwork.

                        Recruitment is open for the following positions

                        1. Unity or Godot or Unreal Game programmers

                        2.3D Designer (eg-: blender, 3ds, 3dmax)

                        3. Script writer

                        4. Game level designer(unity, godot or unreal)

                        5. Marketing

                        6. Event Management

                        Registration Link:https://forms.gle/6XnCBzFABjoEqsts8

                        Last Date of Registration: 18th April,2022
                    </li>
                    <li><b> Design Workshop on Solidworks</b><br>
                        Astrionics- a Student Chapter under Student Research and Project Cell is going to conduct a
                        “Design Workshop on SOLIDWORKS''. A rare opportunity for the students to understand an industry
                        wide used software for designing i.e. Solid works. A time to experience a software used by
                        approximately 41,000 companies and sell more than 3.5 million licenses to design, simulate the
                        required machinery parts.Solid Works is a solid modeling computer-aided design (CAD) and
                        computer-aided engineering (CAE) application published by Dassault Systèmes. The workshop will
                        be based on understanding from the basics of software to simulate your machine parts. You will
                        understand how impact full designing is in the real life industry and how it has changed the
                        Mechanical, Aerospace, Mechatronics and Automobile sector.



                        This 3 days workshop will cover the important aspects for the design thinking and its
                        implementation. The students who have all three days of attendance will be provided with the
                        hard copy of the Certificate. On the third day, there will be a Competition on the basis of what
                        you have learned in the previous sessions of the workshop and the position holders will be
                        provided with goodies as a reward. Moreover the top performers will be getting a chance to work
                        on real-life projects under Student Research and Project Cell.

                        Target Audience: Aerospace, Mechanical, Automobile and Mechatronics Students

                        Workshop Date- 21st April-23rd April,2022

                        Timing will be conveyed soon

                        Registration Cost : 250/-

                        Registration Link: https://tinyurl.com/swdesign101

                        Mode of Workshop: Hybrid(Online and Offline)
                    </li>
                </ul>
            </div>
        </div>
        <div class="item">
            <div class="head">Messages</div>
            <div class="itemCont">
                <ul>
                    <li><b>Placement Services Registration - By Manish Singh (Apr 14, 2022)</b><br>
                        Dear Student, The registration for placement services is open for you. You are advised to
                        register yourself at the earliest. Earlier registration will provide you benefits like more
                        preparation time, early access to 3rd party practice and assessment platforms, which in turn
                        help you in getting placement in your dream company. Placement preparatory input classes will be
                        planned for placement registered students in the coming months, so complete the registration
                        process as soon as possible.
                    </li>
                    <li><b> Regarding Updated Admission officer Details - By Abhishek Mehta (Apr 13, 2022)</b><br>
                        Dear Student, Please note down updated details of your admissions officer as follows, email
                        address: - abhishek.27079@lpu.co.in and contact no 01824-520243.</li>
                    <li><b>CA3 - By Hardeep Kaur (Apr 13, 2022)</b><br>
                        CA3 will be on 19th April. Syllabus-Decade counter with 7 segment display, Shift registers, Up
                        and down counters both synchronous and asynchronous. MCQ based test
                    </li>
                    <li><b>CA3 scheduled on 16th Feb - By Upinder Kaur (Apr 12, 2022)</b><br>
                        Dear students, CA3 is scheduled on 16th Feb from 10-11am. Syllabus is: HTML forms,CSS and
                        Javascript(you can refer the details of the syllabus in the file attached below). Test will
                        on OAS and there will be no negative marking.
                    </li>
                    <li><b>To deposit pending documents in Admissions of Batch 2021-22 - By Abhishek Mehta (Apr 12,
                            2022)</b><br>
                        Dear Student, you are hereby informed to submit your pending documents which were not submitted
                        during admission and at the time of virtual reporting on an immediate basis in LPU Touch
                        (Document Upload Page), in case you fail to do so, your result/myclass may be blocked from 1st
                        May 2022. In case of any query, you may contact your admission officer (Mr. Abhishek Mehta:-
                        abhishek.27079@lpu.co.in 01824-517191) from 10:00am to 4:00pm on working days. Please ignore
                        this message if you have already uploaded the below mentioned documents. Pending
                        Document(s):12th Mark sheet (Front Side),Photograph of father,Photograph of mother
                    </li>
                    <li><b>Registration open for CodeChef Campus Ambassador Program - By Sumit Nagpal (Apr 12,
                            2022)</b><br>
                        Dear Student, Registration is open for CodeChef Campus Ambassador Program. CodeChef is looking
                        for campus rockstars who can be the campus ambassadors for CodeChef Certification (CCDSA)
                        program. Students who are enthusiastic about developing their leadership, and marketing skills
                        and keen on working closely with the CodeChef team can apply for this program. You can find the
                        details about the program below. Role: Campus Ambassador - Promotion and Growth of CodeChef
                        Certification(CCDSA) on your campus Responsibilities: 1. Spread awareness about the CCDSA
                        program on your campus a. How is this certification beneficial? b. Who is this certification
                        beneficial for? c. How does one prepare for the CCDSA certification exam? 2. Reach out to
                        students on your campus via a. Online channels by sharing promotional creatives and content b.
                        Offline promotions include conducting QnA sessions, putting up posters, promoting Certified
                        users, etc. c. Facilitate connection between the CodeChef team and your faculty and students on
                        your campus 3. Build innovative ideas to promote the CCDSA program on your campus a. Connect
                        with CodeChef team members to discuss potential ideas and updates on a weekly basis. Whats in it
                        for you? 1. An appreciation certificate on completion of your term 2. A special bonus to the
                        Campus Ambassador of the month 3. A Free attempt to CodeChef Certification exam based on your

                    </li>

                </ul>

            </div>
        </div>
        <div class="item">
            <div class="head">Attendance</div>
            <div class="itemCont">
                <div class="content"></div>
                <div class="subject">
                    <b>CSE202:OBJECT ORIENTED PROGRAMMING</b>
                </div>
                <div class="bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"
                    style="--value:98">
                </div>

                <div class="content">
                    <div class="subject">
                        <b>CSE326:INTERNET PROGRAMMING LABORATORY</b>
                    </div>
                    <div role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" style="--value:99">
                    </div>

                </div>
                <div class="content">
                    <div class="subject">
                        <b>ECE213:DIGITAL ELECTRONICS</b>
                    </div>
                    <div role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="--value:75">
                    </div>
                </div>
                <div class="content">
                    <div class="subject">
                        <b>ECE216:DIGITAL ELECTRONICS LABORATORY</b>
                    </div>
                    <div role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="--value:77">
                    </div>
                </div>
                <div class="content">
                    <div class="subject">
                        <b>MEC103:ENGINEERING GRAPHICS</b>
                    </div>
                    <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="--value:80">
                    </div>
                </div>
                <div class="content">
                    <div class="subject">
                        <b>MTH166:DIFFERENTIAL EQUATIONS AND VECTOR CALCULUS</b>
                    </div>
                    <div role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="--value:33">
                    </div>
                </div>
                <div class="content">
                    <div class="subject">
                        <b>PEL130:ADVANCED COMMUNICATION SKILLS-I</b>
                    </div>
                    <div role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="--value:55">
                    </div>
                </div>
                <div class="content">
                    <div class="subject">
                        <b>PHY109:ENGINEERING PHYSICS</b>
                    </div>
                    <div role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="--value:65">
                    </div>
                </div>
                <div class="content">
                    <div class="subject">
                        <b>PHY119:ENGINEERING PHYSICS LABORATORY</b>
                    </div>
                    <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                        style="--value:100">
                    </div>
                </div>



            </div>
        </div>
        <div class="item">
            <div class="head">Events</div>
            <div class="itemCont">
                <ul>
                    <li><b> Live Interaction with Kamalneet Singh, Mindset Coach, TedX Speaker</b><br>
                        Tanza Inspiration Summit 2021 <br>
                        <i>DATES: 10 Apr 2021 18:00 - 10 Apr 2021 19:00</i>
                    </li>
                    <li><b>Live interaction with Svetana Kanwar, Founder The Bomsquad Dance Group </b><br>
                        Student Organization-Wissen under the aegis of Division of Student Welfare,Lovely Professional
                        University is going to organize Live Session with 'Svetana Kanwar, Famous Dance Instructor and
                        Founder of The Bomsquad Dance Group.Svetana Kanwar, the amazing dancer who worked in lots of
                        music album also choregraph different songs like for Black Horse & The Cherry Tree with her team
                        at The BOM Squad.<br>
                        <i>DATES: 10 Apr 2021 17:00 - 10 Apr 2021 18:00</i>
                    </li>
                    <li><b>Live Interaction with Shruthi Gupta, Kathak Exponent </b><br>
                        By Dance Society, Cultural Affairs<br>
                        <i>DATES: 10 Apr 2021 18::00 - 10 Apr 2021 19:00</i>
                    </li>
                    <li><b>Udaan 2.0 by Student Organization Pehal an Initiation </b><br>
                        Student Organization Pehal an Initiation under the aegis of Division of Student Welfare is
                        organizing social awareness campaign which would highlight the pitiful condition of Korku girls
                        and their education. Quality education is still a dream for some people such as girls of Korku
                        village in MP. 1000 and you is an initiative to secure the future of the marginalized group of
                        Madhya Pradesh.<br>
                        <i>DATES: 10 Apr 2021 16:30 - 10 Apr 2021 18:00</i>
                    </li>
                    <li><b>Bawaal Reel challenge, Get a chance to featured on Mj5 Official page|| Mj5- India’s best
                            dance group </b><br>
                        Student organization Wissen under the aegis of Division of Student Welfare is coming up with an
                        amazing BAWAAL REEL CHALLENGE.It’s the time to show off your creativity and hidden talent. Reels
                        lets you express yourself and entertain people, the world deserves to see your talent.<br>
                        <i>DATES: 11 Apr 2021 09:00 - 11 Apr 2021 17:00	</i>
                    </li>

                </ul>
                <div class="Profile_item">

                </div>
            </div>
        </div>
        <div class="item">
            <div class="head">Pending Assignments</div>
            <div class="itemCont">
                <ul>
                    <li><b>CSE326</b><br>
                        Course : CSE326 | CA-1 Project | Last Date :18-04-2022

                    </li>
                </ul>

                <div class="Profile_item">

                </div>
            </div>
        </div>
        <div class="item">
            <div class="head">Upcoming Exams</div>
            <div class="itemCont">
                <ul>
                    <li><b> Date : 13 May 2022 MTH166 : DIFFERENTIAL EQUATIONS AND VECTOR CALCULUS</b><br>
                        Exam : Theory End Term (Regular) - All MCQ Objective Type    <br>
                        Room No : Link- https://myclass.lpu.in/ Reporting :
                    </li>
                    <li><b>Date : 16 May 2022 ECE213 : DIGITAL ELECTRONICS </b><br>
                        Exam : Theory End Term (Regular) - All MCQ Objective Type   <br>
                        Room No : Link- https://myclass.lpu.in/ Reporting :
                    </li>
                   
                    <li><b>Date : 18 May 2022 PEL130 : ADVANCED COMMUNICATION SKILLS-I </b><br>
                        Exam : Theory End Term (Regular) - All MCQ Objective Type  <br>
                        Room No : Link- https://myclass.lpu.in/ Reporting :
                    </li
                   
                    <li><b>Date : 20 May 2022 CSE202 : OBJECT ORIENTED PROGRAMMING </b><br>
                        Exam : Theory End Term (Regular) - All MCQ Objective Type   <br>
                        Room No : Link- https://myclass.lpu.in/ Reporting :
                    </li>   
                   
                    <li><b>Date : 23 May 2022 MEC103 : ENGINEERING GRAPHICS </b><br>
                        Exam : Theory End Term (Regular) - All MCQ Objective Type  <br>
                        Room No : Link- https://myclass.lpu.in/ Reporting :
                    </li>
                   
                    <li><b>Date : 25 May 2022 PHY109 : ENGINEERING PHYSICS </b><br>
                        Exam : Theory End Term (Regular) - All MCQ Objective Type <br>
                        Room No : Link- https://myclass.lpu.in/ Reporting :
                    </li>
                   
                </ul>

                <div class="Profile_item">

                </div>
            </div>
        </div>



    </div>

</body>

</html>