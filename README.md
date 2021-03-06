R U DEAD
===================

RUDEAD is a web application to send messages to your relatives once you are dead.

![Main page](https://hipstercat.fr/up/5a3150e3d72ef.png)

Introduction
-------------
Wow! It seems creepy indeed. But you never know when you are going to die and your relatives may be left with no information from you. Do you know how difficult it is for your relatives to go through your death process? Not only they will be sad of losing you, but they will also have to deal with the administrative papers. How can they know your bank account number? How can they know your "enter website name"'s password? How can they know how much you loved them while you never told them when you were alive?

That's where RUDEAD comes in.

You can use RUDEAD to send sensitive information to people you know, as you probably won't care anymore at that time.

Checks
-------
We want the process of checking if you are alive as easy as pushing a button. Periodic emails will be sent to your address, and you just have to click a link to be considered alive.
![check email](https://hipstercat.fr/up/5a314fb009f78.png)

Features
-------
- Registering open to anyone (not configurable at the moment)
- User choose check interval
- User choose interval when messages are sent if not checked before
- Multiple recipients
- Multiple messages (even to the same recipient)
- Webhooks (GET, POST, PUT, DELETE, HEAD supported) to your own website
- WYSIWYG to send HTML messages
- Viewing resulting email before they are sent
- Simple check email: you can tell RUDEAD you are not dead by simply clicking a link (logging in is not needed)

Demo
-------
[Head to the RUDEAD demo](https://hipstercat.fr/rudead/). Signup email is never checked, only used as a username.

Installation from source
-------
1. `git clone https://hipstercat.fr/gogs/hipstercat/rudead`
2. Create a database using a [supported CodeIgniter backend](https://www.codeigniter.com/user_guide/general/requirements.html). I use mysql for easy setup.
3. Configure `application/config/config.php` to your needs.
4. Configure `application/config/database.php` to your database needs.
5. Configure `application/helpers/email_helper.php` to your email needs.
6. Set up a cronjob to call http://your-installation/cron periodically (ideally once per day).
7. Go to http://your-installation/register and set up a new account.

Upgrading from source
-------
1. `git pull`
2. Apply SQL updates on your database.

Contact/issues
-------
Send an email at [rudead@hipstercat.fr](mailto:rudead@hipstercat.fr)