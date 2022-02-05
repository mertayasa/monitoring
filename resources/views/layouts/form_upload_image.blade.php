@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            FilePond.registerPlugin(
                FilePondPluginFileEncode,
                FilePondPluginFileValidateSize,
                FilePondPluginFileValidateType,
                FilePondPluginImageExifOrientation,
                FilePondPluginImagePreview
            )

            let options = {
                acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
                maxFileSize: '2MB'
            }

            let imageUrl

            const url = window.location
            if (url.pathname.includes('edit')) {
                imageUrl = document.getElementById('filePondUpload').getAttribute('data-foto')
                if(!isNull(imageUrl)){
                    options = {
                        acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
                        maxFileSize: '2MB',
                        files: [{
                            source: imageUrl,
                            options: {
                                type: 'remote'
                            }
                        }],
                    }
                }
            }

            FilePond.create(
                document.getElementById('filePondUpload'), options
            )
        })
    </script>
@endpush