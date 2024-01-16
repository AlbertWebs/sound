   {{--  --}}
    <!-- Live Search Scripts -->
    <script type="text/javascript">
      $(document).ready(function(){
          $('.loading-image').hide();
      });
      $('#search').on('keyup',function(){
          // Add preloader
          $('.loading-image').show();
          $value=$(this).val();
          $.ajax({
          type : 'get',
          url : '{{URL::to('search')}}',
          data:{'search':$value},
          success:function(data){
          $('.loading-image').hide();
          $('tbody').html(data);
          }
          });
      })
  </script>
  <script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  </script>
  <!-- </Live Search Scripts -->
   {{--  --}}

<script type='application/ld+json'>
    {
      "@context": "http://www.schema.org",
      "@type": "ProfessionalService",
      "name": "Crystal Car Audio",
      "url": "http://amanivehiclesounds.co.ke/",
      "logo": "https://amanivehiclesounds.co.ke/uploads/logo/amaniCropped.png",
      "sameAs": [ 
        "https://web.facebook.com/crystalclearbeats/",
        "https://www.instagram.com/crys_talcaraudio/",
        "https://www.linkedin.com/company/amani-vehicle-sounds",
        "https://twitter.com/amanisounds",
        "https://www.youtube.com/channel/UCBBJkj3YILwheHsp5KGtjsA"
      ],
      "priceRange": "$$$$",
      "image": "https://amanivehiclesounds.co.ke/uploads/logo/amaniCropped.png",
      "description": "Are you looking to replace or upgrade your car music system?We have what you need. From car stereo, mid range speakers, tweeters, sub woofers, amplifiers and other car accessories",
      "address": {
         "@type": "PostalAddress",
         "streetAddress": " Munyu Trade centre,6th Floor,Shop G3",
         "addressLocality": "Nairobi",
         "addressRegion": "Kenya",
         "postalCode": "00100",
         "addressCountry": "Kenya"
      },
       "openingHours": "Mo 01:00-01:00 Tu 01:00-01:00 We 01:00-01:00 Th 01:00-01:00 Fr 01:00-01:00 Sa 01:00-01:00 Su 01:00-01:00",
       "telephone": "+254790721397"
    }
</script>