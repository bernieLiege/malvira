import json

def charger_memoire(fichier="data/malvira_memoire.json"):
    try:
        with open(fichier, "r", encoding="utf-8") as f:
            memoire = json.load(f)
        return memoire
    except Exception as e:
        print(f"Erreur lors du chargement de la mémoire : {e}")
        return {}

if __name__ == "__main__":
    memoire = charger_memoire()
    print("Mémoire chargée :", memoire)