var disqus_shortname = 'tutoronline';
var disqus_identifier; //made of post id and guid
var disqus_url; //post permalink

function loadDisqus(profile_id) {

if (window.DISQUS) {

   jQuery('#disqus_thread').insertAfter(jQuery('#profile_'  + profile_id)); //append the HTML after the link

   //if Disqus exists, call it's reset method with new parameters
   DISQUS.reset({
      reload: true,
      config: function () {
      this.page.identifier = 'profile_' + profile_id;
      this.page.url = 'http://localhost:8000/profile/' + profile_id;
      }
   });

} else {

   //insert a wrapper in HTML after the relevant "show comments" link
   jQuery('<div id="disqus_thread"></div>').insertAfter(jQuery('#profile_'  + profile_id));
   disqus_identifier = 'profile_' + profile_id; //set the identifier argument
   disqus_url = 'http://localhost:8000/profile/' + profile_id; //set the permalink argument

   //append the Disqus embed script to HTML
   var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
   dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
   jQuery('head').append(dsq);

}
};
