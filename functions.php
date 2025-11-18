<?php

function alert($icon,$title, $msg){
    echo "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: '$icon',
                title: '$title',
                text: '$msg'
            });
        });
    </script>
    ";
}

?>