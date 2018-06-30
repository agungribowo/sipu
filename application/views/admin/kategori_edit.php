<script src="<?php echo base_url();?>assets/backend/tinymce/js/tinymce/tinymce.dev.js"></script>
<script src="<?php echo base_url();?>assets/backend/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/backend/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/backend/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
<script>
  tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
      "save table contextmenu directionality emoticons template paste textcolor importcss"
    ],
    content_css: "css/development.css",
    add_unload_trigger: false,

    toolbar1: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table",
    toolbar2: "custompanelbutton textbutton spellchecker",

    image_advtab: true,

    style_formats: [
      {title: 'Bold text', format: 'h1'},
      {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
      {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
      {title: 'Example 1', inline: 'span', classes: 'example1'},
      {title: 'Example 2', inline: 'span', classes: 'example2'},
      {title: 'Table styles'},
      {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ],

    template_replace_values : {
      username : "Jack Black"
    },

    template_preview_replace_values : {
      username : "Preview user name"
    },

    //file_browser_callback: function() {},

    templates: [ 
      {title: 'Some title 1', description: 'Some desc 1', content: '<strong class="red">My content: {$username}</strong>'}, 
      {title: 'Some title 2', description: 'Some desc 2', url: 'development.html'} 
    ],

    setup: function(ed) {
      ed.addButton('custompanelbutton', {
        type: 'panelbutton',
        text: 'Panel',
        panel: {
          type: 'form',
          items: [
            {type: 'button', text: 'Ok'},
            {type: 'button', text: 'Cancel'}
          ]
        }
      });

      ed.addButton('textbutton', {
        type: 'button',
        text: 'Text'
      });
    },

    spellchecker_callback: function(method, words, callback) {
      if (method == "spellcheck") {
        var suggestions = {};

        for (var i = 0; i < words.length; i++) {
          suggestions[words[i]] = ["First", "second"];
        }

        callback(suggestions);
      }
    }
  });
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Kategori Paket
      <small>Manajemen Paket Umroh</small>
    </h1>

<ol class="breadcrumb">
  <li><a href="<?=base_URL()?>admin/dashboard" ><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
      <li><a href="<?=base_URL()?>admin/kategori" ><i class="fa fa-object-group"></i>&nbsp; Kategori Paket</a></li>
        <li class="active"><i class="fa fa-wpforms"></i>&nbsp; Edit Kategori Paket</li>
</ol>
  </section>

<!-- Main content -->
<section class="content">
 
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
              <h3 class="box-title">Form Edit Kategori Paket Umroh</h3>
            </div>

      <?=form_open_multipart('admin/kategori_edit')?>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label">Id Kategori</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa  fa-qrcode"></i>
                    </div>
                    <input type="text" class="form-control" name="id_kategori" value="<?=$kate['id_kategori']?>" maxlength="50" placeholder="ID KATEGORI" readonly>
              </div>
            </div>
          </div>

            <div class="col-xs-6">
              <div class="form-group">
                <label class="control-label">Kategori Paket</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa  fa-object-group"></i>
                        </div>
                        <input type="text" class="form-control" name="kategori" value="<?=$kate['kategori']?>" maxlength="50" placeholder="Kategori Paket" required autofocus>
                  </div>
                </div>
              </div>

                <div class="col-xs-12">  
                  <div class="form-group">
                      <label>Definisi Paket</label>
                        <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa  fa-pencil"></i>
                              </div>
                                <textarea name="definisi_kategori" rows="10" cols="118"><?=$kate['definisi_kategori']?></textarea>
                        </div><!-- /.input group -->
                  </div><!-- /.form group -->
                </div>

                  <div class="col-xs-6">
                    <div class="form-group">
                      <label class="control-label">Ganti Banner Kategori</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-camera"></i>
                          </div>
                            <input type="file" class="btn btn-primary" name="banner_kategori" placeholder="Banner">
                        </div><!-- /.input group -->
                            <p>* Format File : jpg, JPG, jpeg, JPEG, png, PNG, gif, BMP &nbsp; | &nbsp; Ukuran : 2 MB</p>
                    </div>
                  </div>

        <?php
        $banner_kategori = 'avatar.jpg';
        if($kate['banner_kategori'] && file_exists('assets/backend/images/kategori/'.$kate['banner_kategori'])) {
        $banner_kategori = $kate['banner_kategori'];
        }
        ?>

            <div class="col-md-6">
              <div class="box-body">
                <div class="form-group">
                  <label>Display Banner</label>
                    <div class="fileupload-new thumbnail" class="img-responsive" style="width: 584px; height: 300px;">
                      <img src="<?=base_URL().'assets/backend/images/kategori/'.$banner_kategori?>" alt="Display Banner" style="height: 288px;"/>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    <div class="box-footer">
      <button type="submit" name="submit" class="btn btn-info btn-normal"><i class="fa fa-save"></i> <span> Edit</span></button>
      <a href="<?=base_URL()?>admin/kategori/" class="btn btn-warning btn-normal pull-right"><i class="fa fa-undo"></i> <span> Kembali</span></a>
    </div>

    <?=form_close()?>
    <!-- form end -->
    
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->