<?php $static = get_template_directory_uri() . '/static'; ?>
<section class="right-content">
    <div class="about">
        <h2>About</h2>
        <p>TG - Technical Blog is the unofficial rambling place for <a href="https://gathering.org">The Gathering</a>. </p>
    </div>
    <div class="crew-list">
        <h2>Filter posts by crew</h2>
        <ul><?php wp_list_categories(['title_li' => '']); ?></ul>
    </div>
    <div class="data-box">
        <h2>Related sites</h2>
        <ul>
            <li><a href="https://gathering.org/">The Gathering</a></li>
            <li><a href="https://github.com/gathering">The Gathering GitHub</a></li>
            <li><a href="https://kandu.no/">KANDU</a></li>
        </ul>
    </div>

    <div class="collaborators ">
        <header class="collaborators-header">
            <h2>Collaborators</h2>
        </header>
        <div class="collaborators-list clearfix">
            <a href="https://www.nexthop.no/"><img src="<?php echo esc_url($static); ?>/img/partners/nexthop.svg" alt="nexthop logo"></a>
            <a href="https://www.nlogic.no/"><img src="<?php echo esc_url($static); ?>/img/partners/nlogic.svg" alt="nlogic logo"></a>
            <a href="https://www.arista.com/"><img src="<?php echo esc_url($static); ?>/img/partners/arista.svg" alt="arista logo"></a>
            <a href="https://www.paloaltonetworks.com/"><img src="<?php echo esc_url($static); ?>/img/partners/palo-alto.svg" alt="palo alto logo"></a>
            <a href="https://www.globalfiber.no/"><img src="<?php echo esc_url($static); ?>/img/partners/globalfiber.svg" alt="globalfiber logo"></a>
            <a href="https://www.telenor.no/"><img src="<?php echo esc_url($static); ?>/img/partners/telenor.svg" alt="telenor logo"></a>
        </div>
    </div>
</section>
