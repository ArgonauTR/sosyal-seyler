<div class="card bg-dark text-white text-center h2 mt-2 mb-2 border-white">
    <div class="card-body">
        <div id="disqus_thread"></div>
    </div>
</div>

<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

    var disqus_config = function () {
    this.page.url = '<?php echo $chapter_link; ?>';
    this.page.identifier = '<?php echo $chapter_link; ?>';
    };

    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = '<?php echo $optionfetch["option_disquss_api"]; ?>';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>