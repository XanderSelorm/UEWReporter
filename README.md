#UEWReporter
This web app is a custom CMS which features a blog and multiple user authentication system. This App is coded in PHP and HTML with Laravel Framework.

 Contents
1.0.	Introduction	
1.1 System Overview	
1.2 Authorized Use Permission	
1.3 Glossary	
1.3 References	
2.0	Getting Started	
2.1 System Requirements	
3.0	System Features	
3.1.0 Landing Page	
3.1.1 Register	
3.1.2 Login	
3.1.3 Forgot Password	
3.1.4 Password Reset Page	
3.2 The Navigation Bar
3.2.1 Authenticated Homepage	
3.2.2 Notifications	
3.2.3 The Search Bar	
3.2.4 Profile	
3.2.4 Logout Link	
3.3 The Administrator’s Dashboard	
3.4 Manage Announcements	
3.4.1 Publish Announcements	
3.4.2 View Announcement
3.4.3 Edit Announcements	
3.5 Manage Announcement Categories	
3.5.1 Create Categories	
3.5.2 View Categories	
3.5.3 Edit Categories	
3.6 Manage Users	
3.6.1 Create User	
3.6.2 View User	
3.6.3 Edit User	
3.7 Manage Roles and Permissions	
3.7.1 Roles	
3.7.2 Permissions	

	

1.0.	Introduction
1.1 System Overview
UEW Messenger is an Announcement Repository (Web App) for the University of Education, Winneba. This system is designed to make the dissemination of information amongst the school populace effective, which would otherwise have to be performed manually and through less effective and reliable means. 
Specifically, this system is designed to allow various Public Relations Officers and other sources of information in the school populace to manage and communicate with their target group of audience without necessarily having to use third party applications which might be quite stressful at times. The software will facilitate communication between target student populace and staff at large, in terms of effectively making sure announcements and other information is made readily available to them. 
1.2 Authorized Use Permission
The UEW Messenger is available to the general public, basically. You do not need a password or an account in order to read announcements meant for the general public. If a user desires to have access to a more user-category inclined announcement, he/she has to create an account, have a key to the target category and subscribe to it.
1.3 Glossary
Term
Definition
Administrator / Admin
This refers to a person who owns and is in charge of the system.
Author
This refers to a person who generally has submitted an announcement for dissemination.
Database
Collection of all the information monitored by this system.
Field
A text box or text area within a form.
Reader / Visitor / Viewer
Anyone visiting the site to read Announcements.
Stakeholder
Any person with an interest in the project who is not a developer.
User
An Author, Admin or a Reader/Visitor
1.3 References
IEEE. IEEE Std 830-1998 IEEE Recommended Practice for Software Requirements Specifications. IEEE Computer Society, 1998.
2.0	Getting Started
2.1 System Requirements
The UEW Messenger requires the users to use a modern browser to access its resources. It supports the following web browsers:
    • Chrome
    • Firefox
    • Safari 3 and later
    • Edge
    • Internet Explorer 11
    • iOS Safari
    • Chrome for Android
    • Firefox for Android
    • Edge for Android
3.0	System Features
The UEW Messenger has the following features. However, the system has more room for customization to suite the clients desire or taste provided there is/are feature(s) that needs to be added/removed/changed. 
3.1.0 Landing Page
Generally, all users are redirected to this landing page upon first visit. The page consists of a strip of general announcements that are available to the student populace and the general public at large.
On this page there are two buttons and/or links which to either the Login or the Sign Up pages.


3.1.1 Register
In this module, the user can register in order to become a recognized member and user of the system. There are four (4) mandatory fields on the Register page (Username, Email, Password and Password Confirm). 
To register,
    1. Enter Username. E.g.: NightFury or Night Fury
    2. Enter your email address. E.g.:  nightfury@email.com
NB: Emails are used for verification.
    3. Enter your password. Passwords are to be at least 8 characters long.
    4. Type in the same password to confirm.
    5. Click Register.

3.1.2 Login
On the Login page, the user is required to fill to fields (email and password). This is to enable him/her to be authenticated and authorized to use certain system features depending on his or her permissions. 
NB: All users log in through this module.
To Log in, 
    1. Enter your email address you registered with.
    2. Enter your password
    3. Check or uncheck the Remember Me checkbox.
NB: The remember me checkbox allows the system to recognize the said user upon multiple visits to the site for a definite time period.
    4. Click on Login.
    5. Click of Forgot Password if you have forgotten your password.


3.1.3 Forgot Password
This module allows the user to reset his password even after he has forgotten it.
To reset your password,
    1. Click on Forgot Password on the Login page.
    2. Enter your email address on the Forgot Password page.
    3. Click on Send Password Reset Link.

NB: A password reset link will be sent to your email. Access your mail and click on the Password Reset Link. After which you’ll be redirected to the Password Reset Page.
3.1.4 Password Reset Page
This page has three (3) fields that have to be filled in order for a successful password reset.
    1. Enter your Email Address.
    2. Enter your New Password.
    3. Confirm your password
    4. Click on Reset Password Button.
NB: You should be automatically redirected to the Login page in order to login. 


3.2 The Navigation Bar
This element contains navigations to other parts in the web app.
It has three (3) main menu items; 
    • Home (takes you to the homepage), 
    • Notification (All of the user’s announcement notifications are displayed here),
    • The search bar (allows user to search for announcements),
    • Username Dropdown (this menu contains three (3) sub-menus: 
        ◦ Dashboard (Takes you to the administrator’s workspace i.e. if you’re authorized to view that page.) 
        ◦ Profile (All users can view their profile details here.)
        ◦ Logout (This module clears your session and logs you out of the system.)

3.2.1 Authenticated Homepage
This page on initial start displays all General Announcements. 


3.2.1.1 Discover Available Categories
Users can then go ahead and subscribe to the various announcement categories available by clicking on the Discover Button on the right sidebar.

3.2.2 Notifications
This page contains all the user’s notifications from the categories he has subscribed to.

3.2.3 The Search Bar
This field allows you to search for any announcement in your collection.

3.2.4 Profile
This page contains the currently logged in user’s details. The user is allowed to change or edit the details there.



3.2.4 Logout Link
This link allows the user to sign out of the system and clear his session. Note that you’ll be required to enter your credentials again after visiting the site the next time.
3.3 The Administrator’s Dashboard
This is the back-end of the system, where the administrator will be able to make changes to information residing in the system.
This page specifically shows statistics and shortcuts to all the various functions of the system.



3.4 Manage Announcements
This module allows administrators and authors to manage the content (announcements) in the system.


	3.4.1 Publish Announcements
This sub-module allows the user to publish new announcements into the system, and also allows the user to associate categories and authors to the said announcement.



	3.4.2 View Announcement
 This allow a user to view a particular single announcement. He has the ability to edit or delete announcements from here too.



	3.4.3 Edit Announcements
This sub-module allows the user to make modifications to the selected announcement.

3.5 Manage Announcement Categories
This module allows administrators and authors to manage the categories announcements are associated to in the system. It provides the user with the list of all categories in the system.



	3.5.1 Create Categories
Allows the user to add a new announcement category to the system


	3.5.2 View Categories
Allows the user to view the details of a particular category.




	3.5.3 Edit Categories
Allows user to make modifications to the selected category.


3.6 Manage Users
This module allows the user to manage other users of the system.



3.6.1 Create User
Allows the user to add a new user to the system

	3.6.2 View User
Allows the user to view the details of another user or himself.



3.6.3 Edit User
Allows user to make modifications to the selected user, as well as his permissions


3.7 Manage Roles and Permissions
This module allows the user to manage the roles and permissions of users in the system. Roles are the responsibilities users assume in the system, whereas Permissions are the abilities of such responsibilities.

3.7.1 Roles
This module displays the full list of all roles in the system


Create Role
This sub-module allows a user to add a new role and then associate it with users later on.


View Role
This module allows the user to view a particular role and its assigned permissions



Edit Role
This sub-module allows the user to modify the role in question and or its permissions associated with it.


3.7.2 Permissions
This module displays the full list of all permissions in the system



Create Permission
Allows the user to add additional permissions in relation to the currently available resources in the system. Examples of resources are: Posts, Users, Permissions, Categories.
There are two forms of these permissions, the Basic Permission and the CRUD permission. 
The basic permission allows the user to just insert a onetime permission, example: “Create Post”


The CRUD permissions has to do with all the four (4) basic permissions (Create, Read, Update, Delete). With this, the user just has to enter the resource name and then check the desired permissions. Permissions are automatically generated upon checking the checkboxes.



View Permission
Allows the user to view the details of a particular permission.


Edit Permission
This sub-module allows the user to modify the properties of a particular permission.

