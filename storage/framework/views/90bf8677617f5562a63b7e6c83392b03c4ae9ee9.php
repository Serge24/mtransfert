<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFrame Text</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
</head>

<body style="overflow-x: hidden; padding-left: 40px; padding-right: 40px;">
    <div class="row">
        <div class="col-md-3">
            <div class="col-md-12">
                <h3 style="text-align: left; padding-top: 20px;">Impression des vignettes</h3>
            </div>

            <form id="print-form" action="<?php echo e(route('preview-thumbnail')); ?>" method="GET">
                <div class="row">
                    <div class="form-group">
                        <label for="num_demande1">Numéro de la demande 1</label>
                        <input type="text" class="form-control-file" placeholder="Numéro de demande 1"
                            name="num_demande_1" value="<?php echo e(old('num_demande_1')); ?>" id="num_demande1">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="num_document1">Vignette associée</label>
                        <input type="text" class="form-control-file" placeholder="Vignette associée"
                            name="num_document_1" value="<?php echo e(old('num_document_1')); ?>" id="num_document1">
                    </div>
                </div>
                <div class="row">
                    <button type="button" onclick="clearFieldsAtPosition(1)" class="btn btn-sm btn-warning"
                        style="margin:4px">
                        Effacer
                    </button>
                </div>

                <hr />

                <div class="row">
                    <div class="form-group">
                        <label for="num_demande2">Numéro de la demande 2</label>
                        <input type="text" class="form-control-file" placeholder="Numéro de demande 2"
                            name="num_demande_2" value="<?php echo e(old('num_demande_2')); ?>" id="num_demande2">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="num_document2">Vignette associée</label>
                        <input type="text" class="form-control-file" placeholder="Vignette associée"
                            name="num_document_2" value="<?php echo e(old('num_document_2')); ?>" id="num_document2">
                    </div>
                </div>
                <div class="row">
                    <button type="button" onclick="clearFieldsAtPosition(2)" class="btn btn-sm btn-warning"
                        style="margin:4px">
                        Effacer
                    </button>
                </div>

                <hr />

                <div class="form-check form-check-inline">
                    <input name="disable_background" value="1" class="form-check-input" type="checkbox"
                        id="disable_background" value="option1">
                    <label class="form-check-label" for="disable_background"> Désactiver l'arrière plan</label>
                </div>
                <br />
                <button onclick="serializeForm()" type="button" class="btn btn-sm btn-success">
                    Aperçu
                </button>
                <button onclick="printThumbnails()" type="button" class="btn btn-sm btn-success">
                    Imprimer
                </button>
                <button onclick="printThumbnails2()" type="button" class="btn btn-sm btn-success">
                    Imprimer
                </button>
            </form>

        </div>
        <div class="col-md-9">
            <div class="embed-responsivde embed-responsive-21by9">
                <!-- <iframe height="1000px" width="100%" class="embed-responsive-item" src="http://localhost:8700/print">kk</iframe> -->

                <object id="pdf-frame-object" style="height:1200px; width:100%" data="<?php echo e(route('print-test')); ?>"
                    type="application/pdf">
                    <div>No online PDF viewer installed</div>
                    <!-- <embed src="https://docs.google.com/viewer?url=http://localhost:8700/print&embedded=true"/> -->
                </object>
            </div>
        </div>
    </div>


    <script src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>

    <script>
        let print_test = '<?php echo e(route('print-test')); ?>';

        function updateThumbnailFor(position) {
            let document_no_field = $("#num_document" + position);
            let visa_req_no_field = $("#num_demande" + position);

            if (document_no_field.val().trim() && visa_req_no_field.val().trim()) {
                alert("OK")
            } else {
                alert("Veuillez renseigner les champs de la vignette " + position + " avant de continuer.")
            }
        }

        function serializeForm() {
            let form = $("#print-form");
            let frame_object = $("#pdf-frame-object");

            frame_object.attr("data", print_test + "?" + form.serialize())
        }

        function printThumbnails() {
            var test = document.getElementById('pdf-frame-object');
            if (typeof document.getElementById('pdf-frame-object').print === 'undefined') {

                setTimeout(function() {
                    printThumbnails();
                }, 1000);

            } else {

                var x = document.getElementById('pdf-frame-object');
                x.print();
            }
        }

        function clearFieldsAtPosition(position) {
            let document_no_field = $("#num_document" + position);
            let visa_req_no_field = $("#num_demande" + position);

            document_no_field.val('');
            visa_req_no_field.val('');
        }


        function b64toBlob(b64Data, contentType) {
            var byteCharacters = atob(b64Data)

            var byteArrays = []

            for (let offset = 0; offset < byteCharacters.length; offset += 512) {
                var slice = byteCharacters.slice(offset, offset + 512),
                    byteNumbers = new Array(slice.length)
                for (let i = 0; i < slice.length; i++) {
                    byteNumbers[i] = slice.charCodeAt(i)
                }
                var byteArray = new Uint8Array(byteNumbers)

                byteArrays.push(byteArray)
            }

            var blob = new Blob(byteArrays, {
                type: contentType
            })
            return blob
        }

        function printDocument() {
            const documentId = 'pdf-frame-object'

            const state = (typeof document.getElementById(documentId).contentWindow.document.readyState)

            if (state === "complete") {
                var x = document.getElementById(documentId);
                x.focus();
                x.contentWindow.print()
                x.printAll();

            } else {
                console.log("Hmmmm "+state+" --- "+new Date())
                setInterval(function() {
                    printDocument();
                }, 1000);
            }
        }

        function printThumbnails2() {

            // var pdfObjectUrl = URL.createObjectURL(b64toBlob(data[0].PrintImage, 'application/pdf'))
            // var embeddedPdf = document.getElementById('pdf-frame-object')
            // embeddedPdf.setAttribute('src', pdfObjectUrl)

            // // Then to print
            // embeddedPdf.contentWindow.print()

            printDocument()


        }
    </script>
</body>

</html>
<?php /**PATH /var/www/html/evisa_thumbnail/resources/views/thumbnail-builder.blade.php ENDPATH**/ ?>