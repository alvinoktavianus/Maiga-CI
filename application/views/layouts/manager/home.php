<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Home</h1>
        <p class="title-description"> Maiga Corp. </p>
    </div>
    <section class="section">

        <div class="card card-block">
            <div class="alert alert-success" role="alert">
                <p class="text-center">
                    <strong>Welcome, </strong><?php echo $this->session->userdata('user_session')['email']; ?>
                </p>
            </div>
        </div>

    </section>
</article>