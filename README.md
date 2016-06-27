## This is for Spider Task 4 2016
### Overview Of The Task
    The task given was to make a simple authentication, and authorization
    system.
    The basic mode has 3 functions.
- A registration page to register new members.
- A login page to authenticate registered users.
- A bulletin page for showing posts on that page.

    Users will have different authorization levels, namely:-

* Viewer- Can view posts when logged in.
* Editor- Can add a post to the bulletin board
* Admin- Can delete posts, and change access levels of other users who are not admins.
    The advanced mode included the following:-

* [X] Use captcha in registration page.
* [ ] Post moderation system.

    The language used was PHP. NO Frameworks or modules were used.
    The Database used was a MySQL Database.

### Features implemented
- Register user along with captcha.
- Login a registered user.
- Prevent SQL Injection.
- Perform autherization on registered users.
- Viewers only view posts. Editors can add post. Admin has access to admin panel to delete posts, and change access level of other users.
- Used AJAX for deleting posts, and changing access level of users.
- Implemented Client side, as well as server side validation for all forms.

### List of Server Routes
    The list of server routes is as follows:-
* POST /index.php
* POST/ addPost.php
* POST/ register.php
* POST/ bulletin.php(Through AJAX)
* POST/ adminPanel.php(Through AJAX)

### List of tables used in the database
The database used was a MySQL database. The database name here was **spider_2016**
<br/>
<br/>
Two tables were used. One for users, and the other for posts.
<br/>
<br/>
1. **spider_2016_4**
<br/>
<br/>
<table>
<tr>
<td>Row Name</td>
<td>Username</td>
<td>Password</td>
<td>Access</td>
</tr>
<tr>
<td>Type Of Value Stored</td>
<td>VARCHAR(100)</td>
<td>TEXT</td>
<td>TEXT</td>
</tr>
<tr>
<td>Attributes</td>
<td>PRIMARY KEY</td>
<td>NOT NULL</td>
<td>NOT NULL</td>
</tr>
</table>
<br/>
<br/>
2. **t4_posts**
<table>
<tr>
<td>Row Name</td>
<td>Post_ID</td>
<td>Post</td>
<td>Username</td>
<td>Access</td>
<td>Time</td>
<tr/>
<tr>
<td>Type Of Value Stored</td>
<td>INT</td>
<td>TEXT</td>
<td>VARCHAR(100)</td>
<td>TEXT</td>
<td>DATETIME</td>
<tr/>
<tr>
<td>Attributes</td>
<td>PRIMARY KEY, AUTOINCREMENT(FROM 1)</td>
<td>NOT NULL</td>
<td>NOT NULL</td>
<td>NOT NULL</td>
<td>NOT NULL, DEFAULT CURRENT TIMESTAMP</td>
<tr/>
</table>
<br/>
<br/>
### Build Instructions
> The website uses **WAMP Server**, which is used for running PHP Code, in Windows.
> The first step is to download it if it is not present in your workspace.
<br/>
<br/>
> For windows users,the link for the download can be found [HERE](http://www.wampserver.com/en/)
> Since WAMP is available only in Windows, an alternative could be XAMPP.
> Mac OS, and Linux users can click on [THIS](https://www.apachefriends.org/download.html) link 
> to download XAMPP in their respective devices.
<br/>
<br/>
> After installation, start the server by clicking on the exe file(Windows).
> The username is **root** and the password is *Cjul1968ScB*. This is to ensure compatibility with the
> code written by me.
<br/>
<br/>
> Download all the files and save them in a folder name *Spider_2016_4*.
> Save that folder in the **www** folder created during installation. By default, it is in C:/wamp64/www/
<br/>
<br/>
> Start your favourite browser.
> Type in *http://localhost/Spider_2016_4/* in the box provided.
<br/>
<br/>
> Enjoy using my website. :smiley:
### Screenshots
    Coming Soon!!