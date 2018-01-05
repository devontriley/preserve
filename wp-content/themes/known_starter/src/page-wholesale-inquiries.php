<?php // Template Name: Wholesale Inquiries ?>

<?php get_header(); ?>

<?php include('components/hero.php'); ?>

<div id="wholesale-inquiries-form">

<?php if(!isset($_GET['tab']) || $_GET['tab'] !== 'custom-products') { ?>

  <div class="flexible-content">
    <div class="content">
      <h2 class="module-header">Step 1: Choose Product Categories</h2>
      <p>
        We offer a wide variety of handmade artisanal paper products in each category from gift packaging, weddings, stationery, workspace, party and storage. Select any and all categories you’re interested in learning more about below.
      </p>
    </div>
  </div>

  <div id="category-select-grid">
    <!--
    <div class="option all">
      <label>
        <div class="input">
          <input type="checkbox" value="All" name="" />
          <span>Select All</span>
        </div>
      </label>
    </div>
    -->
    <div class="option">
      <label>
        <div class="image">
          <img src="<?php bloginfo('template_directory'); ?>/img/whole-categories/gift_packaging.gif" />
        </div>
        <div class="input">
          <input type="checkbox" value="Gift Packaging" name="product-category" />
          <span>Gift Packaging</span>
        </div>
      </label>
    </div>
    <div class="option">
      <label>
        <div class="image">
          <img src="<?php bloginfo('template_directory'); ?>/img/whole-categories/wedding.gif" />
        </div>
        <div class="input">
          <input type="checkbox" value="Weddings" name="product-category" />
          <span>Weddings</span>
        </div>
      </label>
    </div>
    <div class="option">
      <label>
        <div class="image">
          <img src="<?php bloginfo('template_directory'); ?>/img/whole-categories/stationery.gif" />
        </div>
        <div class="input">
          <input type="checkbox" value="Stationery" name="product-category" />
          <span>Stationery</span>
        </div>
      </label>
    </div>
    <div class="option">
      <label>
        <div class="image">
          <img src="<?php bloginfo('template_directory'); ?>/img/whole-categories/workspace.gif" />
        </div>
        <div class="input">
          <input type="checkbox" value="Workspace" name="product-category" />
          <span>Workspace</span>
        </div>
      </label>
    </div>
    <div class="option">
      <label>
        <div class="image">
          <img src="<?php bloginfo('template_directory'); ?>/img/whole-categories/party.gif" />
        </div>
        <div class="input">
          <input type="checkbox" value="Party" name="product-category" />
          <span>Party</span>
        </div>
      </label>
    </div>
    <div class="option">
      <label>
        <div class="image">
          <img src="<?php bloginfo('template_directory'); ?>/img/whole-categories/storage.gif" />
        </div>
        <div class="input">
          <input type="checkbox" value="Storage" name="product-category" />
          <span>Storage</span>
        </div>
      </label>
    </div>
    <div class="option">
      <label>
        <div class="image">
          <img src="<?php bloginfo('template_directory'); ?>/img/whole-categories/handmade-paper.gif" />
        </div>
        <div class="input">
          <input type="checkbox" value="Handmade Paper" name="product-category" />
          <span>Handmade Paper</span>
        </div>
      </label>
    </div>
    <div class="option">
      <label>
        <div class="image">
          <img src="<?php bloginfo('template_directory'); ?>/img/whole-categories/packaging.gif" />
        </div>
        <div class="input">
          <input type="checkbox" value="Packaging" name="product-category" />
          <span>Packaging</span>
        </div>
      </label>
    </div>
    <div class="option">
      <label>
        <div class="image">
          <img src="<?php bloginfo('template_directory'); ?>/img/whole-categories/crafts.gif" />
        </div>
        <div class="input">
          <input type="checkbox" value="Crafts" name="product-category" />
          <span>Crafts</span>
        </div>
      </label>
    </div>
  </div>

  <div class="flexible-content">
    <div class="content">
      <h2 class="module-header">STEP 2: TELL US ABOUT YOURSELF</h2>
      <p>We look forward to hearing from you.</p>
      <?php
      gravity_form(
        1,
        $display_title = false,
        $display_description = false,
        $display_inactive = false,
        $field_values = null,
        $ajax = true,
        $tabindex,
        $echo = true
      );
      ?>
    </div>
  </div>

<?php } else { ?>

  <div class="flexible-content">
    <div class="content">
      <h2 class="module-header">CREATE CUSTOM PRODUCTS FOR YOUR CUSTOMERS</h2>
      <p>
        We offer our wholesales partners the ability to customize products specifically to the likes of your customers. We can create handcrafted products in any category from gift packaging, wedding, stationery, workspace to storage wrapped in any of our custom seasonal designs.
      </p>
    </div>
    <div class="numbered-columns">
      <div class="col">
        <div>
          <p class="num">{1}</p>
          <p class="text">Select Products</p>
        </div>
        <img src="<?php echo get_bloginfo('template_directory'); ?>/img/wholesale-products/empty_bag.jpg" />
      </div>
      <div class="col">
        <div>
          <p class="num">{2}</p>
          <p class="text">Choose from hundreds of designs</p>
        </div>
        <img src="<?php echo get_bloginfo('template_directory'); ?>/img/wholesale-products/swatches.jpg" />
      </div>
      <div class="col">
        <div>
          <p class="num">{3}</p>
          <p class="text">Develop customized products for your customers</p>
        </div>
        <img src="<?php echo get_bloginfo('template_directory'); ?>/img/wholesale-products/finished_bag.jpg" />
      </div>
    </div>
  </div>

  <div class="flexible-content">
    <div class="content">
      <h2 class="module-header">INQUIRE ABOUT CUSTOM PRODUCTS</h2>
      <p>We look forward to hearing from you.</p>
      <?php
      gravity_form(
        1,
        $display_title = false,
        $display_description = false,
        $display_inactive = false,
        $field_values = null,
        $ajax = true,
        $tabindex,
        $echo = true
      );
      ?>
    </div>
  </div>

<?php } ?>

</div>

<?php include('components/retail-partners.php'); ?>

<?php get_footer(); ?>
