
function deconnexion() {
        Swal.fire({
            title: 'Etes-vous sûr de vouloir vous déconnecter?',
            text: "Vous serez redirigé vers la page d'accueil",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, je me déconnecte',
            cancelButtonText: 'Non, je reste connecté'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Déconnexion!',
                    'Vous êtes déconnecté.',
                    'success'

                )
                /* attente */
                setTimeout(function() {
                    window.location.href = "session-deconnexion.php";
                }, 2000);
            }
        })
    }

    function supprimer() {
        Swal.fire({
            title: 'Etes-vous sûr de vouloir vous déconnecter?',
            text: "Vous serez redirigé vers la page d'accueil",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, je me déconnecte',
            cancelButtonText: 'Non, je reste connecté'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Déconnexion!',
                    'Vous êtes déconnecté.',
                    'success'

                )
                /* attente */
                setTimeout(function() {
                    window.location.href = "session-deconnexion.php";
                }, 2000);
            }
        })
    }