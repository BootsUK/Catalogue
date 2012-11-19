<div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Welcome to Boots digital marketing hub</h1>
                
            </header>
        </div>

        <?php $email = $this->session->userdata('email'); ?>

<div class="main-container">
    <div class="main wrapper clearfix">
    
    <aside>
                        <ul>
                            <li><a href="http://evdatacenter.co.uk/boots/">Home</a></li>
                            <li><a href="http://evdatacenter.co.uk/boots/account/">Account</a>
                                <ul>
                                    <li><a href="http://evdatacenter.co.uk/boots/account/login">Log-in</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/account/signup">Request sign-up</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/admin/dashboard">Admin dashboard</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/account/logout">Log-out</a></li>
                                </ul>
                            </li>
                            <li><a href="http://evdatacenter.co.uk/boots/campaign/">Campaign</a>
                                <ul>
                                    <li><a href="http://evdatacenter.co.uk/boots/campaign/read">View tasks</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/campaign/create">Add tasks</a></li>
                                </ul>
                            </li>
                            <li><a href="">Catalogue</a>
                                <ul>
                                    <li><a href="http://evdatacenter.co.uk/boots/search/catalogue">Search catalogue</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/search/users">Search users</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/search/tasks">Search tasks</a></li>
                                </ul>
                            </li>
                            <li><a href="http://evdatacenter.co.uk/boots/interactive_team/">Interactive team</a>
                                <ul>
                                    <li><a href="http://evdatacenter.co.uk/boots/interactive_team/display_tasks">View tasks</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/interactive_team/add_tasks">Add tasks</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/interactive_team/search_tasks">Search tasks</a></li>
                                </ul>
                            </li>
                            <li><a href="http://evdatacenter.co.uk/boots/developers_center">Developers center</a>
                                <ul>
                                    <li><a href="http://evdatacenter.co.uk/boots/developers_center/updates">Updates</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/developers_center/developers_roles">Who does what?</a></li>
                                    <li><a href="http://evdataventer.co.uk/boots/developers_center/site_structure">Site structure</a></li>
                                </ul>
                            </li>
                        </ul>
        </aside>

<p><b>You are logged in as: <?php if($email != ""){echo $email;}else{echo "You are not currently logged in";} ?></b></p>
        