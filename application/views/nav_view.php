<div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Welcome to Boots digital marketing hub</h1>
                
            </header>
        </div>

        <?php $email = $this->session->userdata('email'); ?>

        
<div class="main-container">
    <div class="main wrapper clearfix">
        <p><b>You are logged in as: <?php if($email != ""){echo $email;}else{echo "You are not currently logged in";} ?></b></p>
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
                                    <li><a href="http://evdatacenter.co.uk/boots/campaign/delete">Delete tasks</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/campaign/update">Update tasks</a></li>
                                </ul>
                            </li>
                            <li><a href="">Catalogue</a>
                                <ul>
                                    <li><a href="http://evdatacenter.co.uk/boots/search/catalogue">Search catalogue</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/search/users">Search users</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/search/tasks">Search tasks</a></li>
                                </ul>
                            </li>
                        </ul>
        </aside>