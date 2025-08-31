<!-- ✅ Promotion Banner -->
<div id="promo-banner" style="width:100%; background: #7a0a7a; color: white; padding: 12px 20px; display: flex; justify-content: center; align-items: center; font-family: sans-serif; position: relative;">
    <div style="text-align: center;">
        <strong>Watch best poetry videos online!</strong>
        <a href="https://www.youtube.com/channel/UCahlIkSQiknvUKucZDkA1Pg" target="_blank" style="color: white; font-weight: 600; text-decoration: underline; margin-left: 8px;">Check out Now &gt;</a>
    </div>
    <div onclick="document.getElementById('promo-banner').style.display='none'"
         style="cursor: pointer; font-size: 20px; position: absolute; right: 20px; top: 50%; transform: translateY(-50%);">
        &#x2716;
    </div>
</div>

<script>
    if (!sessionStorage.getItem('hideBanner')) {
        document.getElementById('promo-banner').style.display = 'flex';
    } else {
        document.getElementById('promo-banner').style.display = 'none';
    }

    document.querySelector('#promo-banner div[onclick]').onclick = function() {
        document.getElementById('promo-banner').style.display = 'none';
        sessionStorage.setItem('hideBanner', '1');
    };
</script>
