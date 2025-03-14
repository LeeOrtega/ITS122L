  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queen V Mushroom Farm</title>
    <link rel="stylesheet" href="index.css">
    <link rel="icon" type="image/x-icon" href="img/favicon_io/favicon.ico">
  </head>
  <body>

    <div class="header">
      <nav class="navbar">
        <div class="logo">
          <a href="index.php">
              <img src="img/logo.png" alt="Logo" height="100px" width="auto">
          </a>


        </div>
        <div class="right-navbar">
          <ul>
            <li><a href="blog.php">BLOG</a></li>
            <li><a href="contact.php">CONTACT</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="slideshow-container">
      <div class="slide">
        <img src="img/trees.png" alt="Image 1">
        <div class="text-overlay">
          <h1>WELCOME TO</h1>
          <h2>THE QUEEN V MUSHROOM FARM</h2>
          <a href="contact.html" class="btn">JOIN US</a>
        </div>
      </div>
      <div class="slide">
        <img src="img/trees2.png" alt="Image 2">
      </div>
      <div class="slide">
        <img src="img/trees3.png" alt="Image 2">
      </div>
      <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
      <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>


    <script>
      let slideIndex = 0;
      showSlides(slideIndex);
      
      function showSlides(n) {
        let slides = document.querySelectorAll(".slide");
        
        if (n >= slides.length) slideIndex = 0; // Loop back to the first slide
        else if (n < 0) slideIndex = slides.length - 1; // Loop back to the last slide
        else slideIndex = n;
      
        slides.forEach(slide => slide.style.display = "none"); // Hide all slides
        slides[slideIndex].style.display = "block"; // Show the current slide
      }
      
      function changeSlide(n) {
        showSlides(slideIndex + n);
      }
      </script>

  <section class="centered-section">
    <img src="img/logo.png" alt="Illustration">
    <h2>Serving at the leading edge of integrated systems design, The Mushroom Farm is prototyping and implementing the solutions needed to steward the transition ahead.</h2>
    <p>
      Nestled in the heart of Pulilan, Bulacan, <strong>V Mushroom Farm</strong> is committed to sustainable agriculture, transforming traditional farming into a regenerative system that benefits both people and the planet.
    </p>
    <p>
      Through implementation of the solutions needed in today’s world, The Mushroom FARM reconnects humanity to the inherent abundance in our natural systems, activating planetary regeneration.
    </p>
    <h3>It’s time to cultivate a sustainable future with Queen V Mushroom Farm.</h3>
  </section>

  <section class="sampler-section">
    <div class="text-content">
      <h2><em>Fresh from the Farm!</em></h2>
      <h1>Queen V's Mushrooms</h1>
      <p>Edible mushrooms that are locally grown like Oyster mushrooms, Milky mushrooms, Dayami mushrooms, and Shiitake mushrooms. </p>
      <p>Perfect for home cooking, gourmet meals, or sharing with family and friends!</p>
    </div>
    <div class="image-content">
      <img src="img/Mushroom2.png" alt="Queen V Mushroom Sampler">
    </div>
  </section>

  <section class="centered-section">
    <img src="img/logo.png" alt="Queen V Mushroom Farm Logo">
    <h2>Growing Health, Sustainability, and Innovation—One Mushroom at a Time</h2>
    <p>
      At <strong>Queen V Mushroom Farm</strong> we believe that mushrooms are more than just food—they are nature’s key to sustainability. Our farm is dedicated to cultivating high-quality, organic mushrooms while enriching the environment and supporting local communities.
    </p>
    <p>
      Through eco-friendly farming methods and continuous innovation, we are shaping a future where agriculture works in harmony with nature. Join us in our mission to bring fresh, nutritious mushrooms to every table and inspire a more sustainable world.
    </p>
    <h3>It’s time to nourish the future—naturally, with Queen V Mushroom Farm.</h3>
  </section>

  <section class="hero hero-1">
    <div class="hero-content">
      <h1>Cultivating a Regenerative Future</h1>
      <p>
        At Queen V Mushroom Farm, we harness the natural power of fungi to transform traditional agriculture. Our regenerative practices enrich the soil, bolster biodiversity, and conserve water, all while sequestering carbon. By nurturing our land and community, we are building an agricultural model that is both ecologically sound and economically sustainable. Join us on our journey to create a thriving, greener future.
      </p>
    </div>
  </section>

  <section class="centered-section">
    <img src="img/logo.png" alt="Queen V Mushroom Farm Logo">
    <h2>At Queen V Mushroom Farm, we redefine sustainable agriculture through innovation and community-driven practices.</h2>
    <p>
      Rooted in the fertile lands of Bulacan, our farm embraces regenerative techniques that restore soil health and nurture local biodiversity. We’re transforming traditional farming into a dynamic ecosystem where every mushroom contributes to a healthier planet.
    </p>
    <p>
      By blending time-honored methods with modern eco-innovations, we reconnect our community with nature’s abundance, paving the way for a future where agriculture benefits both people and the environment.
    </p>
    <h3>Join us in sowing the seeds of a regenerative tomorrow.</h3>
  </section>

  <section class="centered-grid">
    <div class="row">
      <div class="column">
        <img src="img/People pictures1.jpg" alt="picture">
      </div>
      <div class="column">
        <img src="img/People picture 2.jpg" alt="picture">
      </div>
      <div class="column">
        <img src="img/People picture 3.jpg" alt="picture">
      </div>
    </div>
  </section>

  <section class="centered-section">
    <img src="img/logo.png" alt="Queen V Mushroom Farm Logo">
    <h2>Farming with Purpose, Growing for the Future</h2>
    <p>
      At Queen V Mushroom Farm, we believe that sustainable agriculture is more than just growing food—it’s about creating a lasting impact. Our farm is dedicated to cultivating premium mushrooms while restoring the balance between nature and agriculture.
    </p>
    <p>
      Through mindful farming practices, we enrich the soil, reduce waste, and contribute to a healthier environment. By working in harmony with nature, we’re building a future where farming is not just productive, but regenerative.
    </p>
    <h3>Join us in growing a greener, healthier tomorrow.</h3>
  </section>



  <section class="image-grid">
    <div class="image-item tall">
        <img src="img/Mushroom2.png" alt="Farm">
    </div>
    <div class="image-item small">
        <img src="img/mushroom3.png" alt="Compost">
    </div>
    <div class="image-item wide">
        <img src="img/People pictures1.jpg" alt="Coastal Farming">
    </div>
  </section>

    <footer>
      <div class="socmed">
          <a href="https://www.facebook.com/queen.v.mushroom.and.lettuce.farm/?fref=nf&pn_ref=story&_rdr" target="_blank">
              <img src="img/fb-icon.png" height="40px" width="auto">
          </a>
      </div>
      <div class="footer-content">
          <div class="footer-links">
              <a href="contact.php">JOIN US</a>
              <a href="blog.php">BLOG</a>
              
          </div>
          <div class="footer-address">
              <img src="img/logo.png" alt="Logo" height="200px" width="auto">
              <p>Sitio Manalili, Pulilan, 3005 Bulacan</p>
          </div>
      </div>
  </footer>

    
  </body>
  </html>
