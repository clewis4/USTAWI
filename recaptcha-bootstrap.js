(function(){
  function hasValidSiteKey(){
    var el = document.querySelector('.g-recaptcha');
    if(!el) return false; // no widget in DOM
    var key = el.getAttribute('data-sitekey');
    if(!key || key === 'YOUR_RECAPTCHA_SITE_KEY') return false;
    return true;
  }
  function removeWidgets(){
    document.querySelectorAll('.g-recaptcha').forEach(function(n){
      // Hide the widget placeholder when no valid key to avoid "Invalid site key" errors
      n.style.display = 'none';
    });
  }
  function loadApi(){
    if (window.grecaptcha) return; // already loaded
    var s = document.createElement('script');
    s.src = 'https://www.google.com/recaptcha/api.js';
    s.async = true;
    s.defer = true;
    document.head.appendChild(s);
  }
  function init(){
    if(hasValidSiteKey()){
      loadApi();
    } else {
      removeWidgets();
    }
  }
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();