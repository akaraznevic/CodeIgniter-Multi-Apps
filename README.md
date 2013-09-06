CodeIgniter-Multi-Apps
======================

###Multi-websites on single installation of CodeIgniter 2.x.x with shared resources

For the following examples, we'll create two applications:

* 1. a **web** application
* 2. a **mobile** application

Both application will share the same resources: **models**, **libraries**, **helpers**.

When you download the distribution and extract the archive, you end up with this layout:

    CodeIgniter_2.x.x/
        application/
        system/
        user_guide/
        index.php
        license.txt       
                
Let's look at my layout for multiple websites:

    application/
        web/
            config/
            controllers/
            hooks/
            views/
        mobile/
            config/
            controllers/
            hooks/
            views/
        shared/
            helpers/
            libraries/
            models/
            third_party/
    system/
    webroot/
        index.php

**Models**, **libraries** and **helpers** are the same for **web** and **mobile** applications.

This folder layout lets you store files outside the webroot, primarily for added **security**. Those files won't be accessible through a web browser, but they will be accessible to your PHP code.
