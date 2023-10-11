			<footer>
				<div class="footer clearfix mb-0 text-muted">
					<div class="float-start">
						<p>2022 &copy; JanikLampung</p>
					</div>
					<div class="float-end">
						<p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">Leni Suryani</a></p>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendors/apexcharts/apexcharts.js') ?>"></script>
	<script src="<?= base_url('assets/js/pages/dashboard.js') ?>"></script>
	<script src="<?= base_url('assets/js/mazer.js') ?>"></script>


	<!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>
    <script src="<?= base_url('assets/js/demo/datatables2-demo.js') ?>"></script>
    <script src="<?= base_url('assets/js/all.min.js') ?>"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <!-- <script src="<?= base_url('assets/dist/sweetalert2.all.js') ?>"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

	<script type="text/javascript">
		const flashData = $('.flash-data').data('flashdata');
        const objek = $('.flash-data').data('objek');
        console.log(flashData);
        console.log(objek);
        if (flashData) {
            //'Data ' + 
            Swal.fire({
                title: objek,
                text: flashData,
                icon: 'success'
            });
        }
        $('.tombol-hapus').on('click', function(e) {
            const hapus = $(this).data('hapus');
            const href = $(this).attr('href');
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data " + hapus + " akan dihapus!",
                icon: 'warning',
                confirmButtonText: 'Hapus',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });

        $('.tombol-terima').on('click', function(e) {
            const href = $(this).attr('href');
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Pesanan yang diterima, tidak dapat dikembalikan!",
                icon: 'warning',
                confirmButtonText: 'diterima',
                showCancelButton: true,
                confirmButtonColor: '#32a852',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });
        $('.tombol-yakin').on('click', function(e) {
            const href = $(this).attr('href');
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "",
                icon: 'warning',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                showCancelButton: true,
                confirmButtonColor: '#32a852',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });
        $('.minta-password').on('click', function(e) {
            Swal.fire({
                title: 'Masukkan Password',
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Look up',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return fetch(`//api.github.com/users/${login}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                            )
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: `${result.value.login}'s avatar`,
                        imageUrl: result.value.avatar_url
                    })
                }
            })
        });

        $('.custom-file-input').on('change', function(){
            let filename = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(filename);
        });

        $(function() {
            $('.newMenuModalButton').on('click', function(){
                $('#newMenuModalLabel').html('Add New Menu');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('menu') ?>');
            });

            $('.updateMenuModalButton').on('click', function() {
                $('#newMenuModalLabel').html('Edit Menu');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('menu/updateMenu') ?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('menu/getUpdateMenu') ?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#menu').val(data.menu);
                        $('#active').attr("checked", true);
                        if(data.active == 1){
                            $('#active').attr("checked", true);
                        } else{
                            $('#active').attr("checked", false);
                        }
                    }
                });
            });
        });

        // $(function() {
        //     $('.bookGroomingModalButton').on('click', function() {
        //         const id = $(this).data('jadwal');
        //         jQuery.ajax({
        //             url: '<?= base_url('')?>',
        //             data: {id : id},
        //             method: 'post',
        //             dataType: 'json',
        //             success: function(data) {
        //                 console.log(data);
        //                 $('#jadwal').val(data.id);
        //             }
        //         });
        //     });
        // });

        $(function() {
            $('.newRoleModalButton').on('click', function(){
                $('#newRoleModalLabel').html('Add New Role');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('Admin/role') ?>/');
            });

            $('.updateRoleModalButton').on('click', function() {
                $('#newRoleModalLabel').html('Edit Role');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('Admin/updateRole') ?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('admin/getUpdateRole') ?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#role').val(data.role);
                    }
                });
            });
        });

        $(function() {
            $('.setRoleButton').on('click', function() {
                $('#setRoleLabel').html('Set User Role');
                $('.modal-footer button[type=submit]').html('Save');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('admin/getUserData') ?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#name').val(data.name);
                        $('#role_id').val(data.role_id);
                    }
                });
            });
        });

        $(function() {
            $('.newSubMenuModalButton').on('click', function(){
                $('#newSubMenuModalLabel').html('Add New SubMenu');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('menu/subMenu') ?>');
            });

            $('.updateSubMenuModalButton').on('click', function() {
                $('#newSubMenuModalLabel').html('Edit SubMenu');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('menu/updateSubMenu') ?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('menu/getUpdateSubMenu') ?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#title').val(data.title);
                        $('#menu_id').val(data.menu_id);
                        $('#url').val(data.url);
                        $('#icon').val(data.icon);
                        $('#is_active').attr("checked", true);
                        if(data.is_active == 1){
                            $('#is_active').attr("checked", true);
                        } else if(data.is_active == 0){
                            $('#is_active').attr("checked", false);
                        }
                    }
                });
            });
        });

        $(function() {
            $('.newAgamaModalButton').on('click', function(){
                $('#newAgamaModalLabel').html('Add New Religion');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/agama') ?>');
            });

            $('.updateAgamaModalButton').on('click', function() {
                $('#newAgamaModalLabel').html('Edit Religion');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/updateAgama') ?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('DataMaster/getUpdateAgama') ?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id_agama').val(data.id_agama);
                        $('#agama').val(data.agama);
                    }
                });
            });
        });

        $(function() {
            $('.newKurirModalButton').on('click', function(){
                $('#newKurirModalLabel').html('Add New Shipper');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/kurir') ?>');
            });

            $('.updateKurirModalButton').on('click', function() {
                $('#newKurirModalLabel').html('Edit Shipper');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/updateKurir') ?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('DataMaster/getUpdateKurir') ?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id_kurir').val(data.id_kurir);
                        $('#kurir').val(data.kurir);
                    }
                });
            });
        });

        $(function() {
            $('.newRekeningModalButton').on('click', function(){
                $('#newRekeningModalLabel').html('Add New Bank Account');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/rekening') ?>');
            });

            $('.updateRekeningModalButton').on('click', function() {
                $('#newRekeningModalLabel').html('Edit Bank Account');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/updateRekening') ?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('DataMaster/getUpdateRekening') ?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id_rekening').val(data.id_rekening);
                        $('#no_rekening').val(data.no_rekening);
                        $('#bank').val(data.bank);
                        $('#atas_nama').val(data.atas_nama);
                        $('#email').val(data.email);
                    }
                });
            });
        });

        $(function() {
            $('.newKategoriModalButton').on('click', function(){
                $('#newKategoriModalLabel').html('Add New Category');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/kategori') ?>');
            });

            $('.updateKategoriModalButton').on('click', function() {
                $('#newKategoriModalLabel').html('Edit Category');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/updateKategori') ?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('DataMaster/getUpdateKategori') ?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id_kategori').val(data.id_kategori);
                        $('#kategori').val(data.kategori);
                    }
                });
            });
        });

        $(function() {
            $('.newMetodeBayarModalButton').on('click', function(){
                $('#newMetodeBayarModalLabel').html('Add New Payment');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/metodeBayar') ?>');
            });

            $('.updateMetodeBayarModalButton').on('click', function() {
                $('#newMetodeBayarModalLabel').html('Edit Payment');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/updateMetodeBayar') ?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('DataMaster/getUpdateMetodeBayar') ?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id_metode_bayar').val(data.id_metode_bayar);
                        $('#metode_bayar').val(data.metode_bayar);
                    }
                });
            });
        });

        $(function() {
            $('.newKontenModalButton').on('click', function(){
                $('#newKontenModalLabel').html('Add New Content');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/konten') ?>');
            });

            $('.updateKontenModalButton').on('click', function() {
                $('#newKontenModalLabel').html('Edit Content');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('DataMaster/updateKonten') ?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('DataMaster/getUpdateKonten') ?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#header').val(data.header);
                        $('#konten').val(data.content);
                        $('#footer').val(data.footer);
                    }
                });
            });
        });

        $(function() {
            $('.newProdukModalButton').on('click', function(){
                $('#newProdukModalLabel').html('Add New Product');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', '<?= base_url('Produk/produk') ?>');
            });

            $('.updateProdukModalButton').on('click', function() {
                $('#newProdukModalLabel').html('Edit Product');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', '<?= base_url('Produk/updateProduk') ?>');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '<?= base_url('Produk/getUpdateProduk') ?>',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id_produk').val(data.id_produk);
                        $('#kode_produk').val(data.kode_produk);
                        $('#nama_produk').val(data.nama_produk);
                        $('#merk').val(data.merk);
                        $('#id_kategori').val(data.id_kategori);
                        $('#stok').val(data.stok);
                        $('#harga').val(data.harga);
                        $('#satuan').val(data.satuan);
                        $('#deskripsi').val(data.deskripsi);
                    }
                });
            });
        });

    </script>
    <script type="text/javascript">
        
        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('admin/changeAccess') ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/roleAccess/'); ?>" + roleId;
                }
            });
        });

        $(document).ready(function() {
            setInterval(function() {
                $('#show').load('<?= base_url('User/notifikasi') ?>')
            }, 10000);
        });

        function notifikasi() {
            $.ajax({
                type: "POST",
                url: '<?= base_url('User/readAllNotification') ?>',
                data:{action:'call_this'},
                success:function(html) {

                }
            });
        }

        function read(id) {
            $.ajax({
                type: "POST",
                url: '<?= base_url('User/readNotification/') ?>' + id,
                data:{action:'call_this'},
                success:function(html) {

                }
            });
        }

            
    </script>
</body>
</html>
