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

Installation
-------
1. [Check for releases](https://hipstercat.fr/gogs/hipstercat/rudead/releases) and download the latest one.
2. Configure `application/config/config.php` to your needs.
3. Set up a cronjob to call http://your-installation/cron periodically (ideally once per day).
4. Go to http://your-installation/register and set up a new account.




