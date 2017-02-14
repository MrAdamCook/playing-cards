Prerequisites
------------- 
Install the following:

* Vagrant (https://www.vagrantup.com/docs/installation/)
* VirtualBox (https://www.virtualbox.org/)

Once both Vagrant and VirtualBox have been installed you may need to restart your
Windows machine in order for commands to work properly.

In your command line prompt change to the project root directory.
Once in the project root, start your virtual machine.

$ vagrant up


After installation
------------------

Connect to your virtual machine using:

$ vagrant ssh

$ cd /var/www/html

$ phpunit

$ php index.php