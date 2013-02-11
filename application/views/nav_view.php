<div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Welcome to Boots digital marketing hub</h1>
            </header>

<ul class="menu">
                            <li><a href="http://evdatacenter.co.uk/boots/">Home</a></li>
                            <li><a href="http://evdatacenter.co.uk/boots/account/">Account</a>
                                <ul>
                                    <li><a href="http://evdatacenter.co.uk/boots/account/login">Log-in</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/account/signup">Request sign-up</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/admin/dashboard">Admin dashboard</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/account/logout">Log-out</a></li>
                                </ul>
                            </li>
                            <li><a href="http://evdatacenter.co.uk/boots/interactive_team/">Interactive team</a>
                                <ul>
                                    <li><a href="http://evdatacenter.co.uk/boots/interactive_team/display_tasks">View tasks</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/interactive_team/select_date_range">Date range</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/interactive_team/add_tasks">Add tasks</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/interactive_team/search_tasks">Search tasks</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/interactive_team/priority_scale">Priority scale</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/review/review_form">Submit a review</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/review/">Reviews</a></li>
                                </ul>
                            </li>
                            <li><a href="http://evdatacenter.co.uk/boots/developers_center">Developers center</a>
                                <ul>
                                    <li><a href="http://evdatacenter.co.uk/boots/developers_center/updates">Updates</a></li>
                                    <li><a href="http://evdatacenter.co.uk/boots/developers_center/wish_list">Wish list</a></li>
                                </ul>
                        </li>
                        <li><a href="http://evdatacenter.co.uk/boots/blog/">Blog</a>
                            <ul>
                                <li><a href="http://evdatacenter.co.uk/boots/blog/latest/">View posts</a></li>
                                <li><a href="http://evdatacenter.co.uk/boots/blog/insert_post_form/">Insert new post</a></li>
                            </ul>
                        </li>
                </ul>

</div>

        <?php $email = $this->session->userdata('email'); ?>

<div class="main-container">

<p><b>You are logged in as: <?php if($email != ""){echo $email;}else{echo "You are not currently logged in";} ?></b></p>
        