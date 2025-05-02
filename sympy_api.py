import sys
import sympy as sp

def main(query):
    try:
        # Évaluer l'expression avec SymPy
        result = sp.sympify(query)
        return str(result)
    except Exception as e:
        return str(e)

if __name__ == "__main__":
    if len(sys.argv) > 1:
        query = sys.argv[1]
        print(main(query))
    else:
        print("Aucune requête fournie.")
