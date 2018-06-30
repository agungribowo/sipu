<div class="row">
  <div class="container">
    <div class="login-fullpage">
    <div class="dropdown-wrap">                                                                            
      <div class="row">
        <div class="col-sm-8 col-lg-offset-2">
          <div class="f-login-content">
            <div class="f-login-header">
              <div class="f-login-title color-dr-blue-2">Pendaftaran</div>
              <div class="f-login-desc color-grey">Daftar Sebagai Anggota</div>
            </div>
          
          <form action="<?=base_url('auth/pendaftaran')?>" method="post" enctype="multipart/form-data" class="f-login-form">
            <div class="input-style-1 b-50 type-1 color-5">
              <input type="hidden" name="id_anggota" value="<?=$kodeunik?>" placeholder="ID ANGGOTA" class="form-control" >
            </div>

            <div class="input-style-1 b-50 type-1 color-5">
              <input type="text" name="username" placeholder="USERNAME" class="form-control" >
            </div>
            
            
              <input type="Password" name="password" placeholder="PASSWORD" class="input-style-1 form-control" >
            
            
              <input type="text" name="nama_anggota" placeholder="NAMA ANGGOTA" class="input-style-1 form-control" >
            
            
              <input type="email" name="email_anggota" placeholder="EMAIL ANGGOTA" class="input-style-1 form-control" >
              
              <select class="input-style-1 form-control" name="tipe_identitas" >
                <option>KTP</option>
                <option>SIM</option>
                <option>STNK</option>
              </select>


            <div class="input-style-1 b-50 type-1 color-5">
              <input type="number" name="no_identitas" placeholder="NO IDENTITAS" class="form-control" >
            </div>
            
            <div class="input-style-1 b-50 type-1 color-5">
              <input type="number" name="no_hp" placeholder="NO HP" class="form-control" >
            </div>

            <div class="input-style-1 b-50 type-1 color-5">
              <input type="text" name="tgl_lahir" placeholder="TANGGAL LAHIR" class="datepicker"" >
            </div>
            
            <select name="jekel" class="input-style-1 b-50 type-1 color-5 form-control">
                <option>Laki - Laki</option>
                <option>Perempuan</option>                
              </select>
            
            <div class="input-style-1 b-50 type-1 color-5">
              <input type="text" name="alamat" placeholder="ALAMAT" class="form-control" >
            </div>
            
            <div class="row">
              <div class="col-xs-12 col-sm-12"> 
                <button type="submit" name="submit" class="c-button full b-40 bg-blue-8 hv-blue-8-o">DAFTAR</button> 
              </div>
            </div>                
          </form>
        </div>        
      </div>
    </div>
  </div>
</div>
</div>
</div>                                                                                                            