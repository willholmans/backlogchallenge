## Laravel 4 project - Netwisehosting

### Windows Install

**Install in this order:**

1. Install git by navigating to: *http://git-scm.com/download/win*. On install choose the windows bash selection and keep LF line endings using Input.
2. Install virtualbox by navigating to: *http://download.virtualbox.org/virtualbox/4.3.14/VirtualBox-4.3.14-95030-Win.exe*.
3. Install vagrant by navigating to: *https://dl.bintray.com/mitchellh/vagrant/vagrant_1.6.3.msi*.
4. Reboot the system.

### Using your new Vagrant VM

1. Navigate in windows to your git bash terminal and type **git clone https://github.com/netwisehosting/laravelproject.git**. (This will clone the netwisehosting laravel project from our private repository on github).
2. **cd laravelproject/**
3. **Vagrant up**. Now sit back and wait for the VM to boot and provision!
4. When finished type **Vagrant ssh**. 
5. Now all that is left is to add your environment credentials for the database etc. In the VM change the working directory **cd /var/www** then type **sudo vim .env.development.php**. In vim copy the array of credentials like so:

> <?php 

return array(

	'DATABASE_USER' => '(Username here)',
	'DATABASE_PASSWORD' => '(Password here)',
	'DATABASE_NAME' => '(Database name here)',
	
);

6. Thats it! Now just go to your chrome browser and type http://localhost:8080 and your development environment is ready.
