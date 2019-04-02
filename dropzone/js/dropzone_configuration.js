$(document).ready(function () {



    function initialisation_Delete_Btn() {
        $(".pjdelbtn").unbind("click" );
        $(".pjdelbtn").on( "click", function() {
            $(".pjdelbtn").unbind('click');
            /*
             * Pour obtenir le nom du fichier on remplace les espaces par les underscore
             * ce qui était fait tout en haut et puis nous essayons d'obtenir le nom du fichier en
             * remplacant les underscore par les espace et enlever le mot deletep_..
             */

            var get_file_name = $(this).attr('id').substring(8, $(this).attr('id').length );
            if( $(this).attr('id').substring(8, $(this).attr('id')) != "deletep_" ){
                var all_id =  replaceAll($(this).attr('id'), '_', ' ');
                get_file_name = all_id.substring(9, all_id.length);
                // console.log("dans ce cas nouveau fichier");
            }

            /*Supprimer une image du serveur et
             du front en cliquant sur le lien delete
             */
            var dossier_jaune = getDj();

            var idForm = $(this).parent().parent().parent().attr('id');
            var foldername = idForm.substr(4, idForm.length);

            //console.log("Folder name "+foldername);

            $.ajax({
                type: 'POST',
                url: 'dj_detail_pj_upload.php',
                data: {
                    file: get_file_name,
                    current_dir : foldername,
                    type: 'delete',
                    id_dj: getIdDj(),
                    dossier_id_dj : dossier_jaune,
                },
                success:function(data) {
                    //console.log("Delete "+data)
                    $(".div_dj_id").html(data);
                    initialisation_Delete_Btn();
                    fresh();
                    delte_space_css();
                }
            });
            $(this).parent().remove();

        });
    }



    //prevent error: "Error: Dropzone already attached."
    Dropzone.autoDiscover = false;


var dossier;
        $(".dropzone").dropzone({

            url: "../../ajax/upload.php",

            addRemoveLinks: true,
            init: function () {



                /*
                 à chaque ajout de fichier il s'éxécute
                 */
                this.on("addedfile", function(file) {

                    idForm = $(this.element).attr('id');
                    console.log("je suis à "+idForm);
                    if(!dossier){

                    }

                });

                this.on("queuecomplete", function (file) {


                    $.ajax({
                        type: 'POST',
                        url: '../../ajax/upload.php',
                        data: {
                            type: 'rangement',
                            dossier: idForm,
                        },
                        success:function(data) {

                        }
                    });


                });

                this.on("uploadprogress", function(file, progress) {



                });


            },

            maxFilesize: 2000, // MégaBit
            /*
             Au cas ou l'upload a reussi on transfere le fichier dans son dossier
             */
            success: function (file, response) {

                $.ajax({
                    type: 'POST',
                    url: '../../ajax/upload.php',
                    data: {
                        type: 'rangement',
                        dossier: idForm,
                        dossier_temp:  <?php echo $DOSSIER_UPLOAD; ?>,
                    },
                    success:function(data) {

                    }
                });

            },

            /*
             Au cas ou l'upload n'a pas reussi
             */
            error: function (file, response) {
                file.previewElement.classList.add("dz-error");
                $('#up-ack').css('color', 'red').html(response);
            }
        });








});
