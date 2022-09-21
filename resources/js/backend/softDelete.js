// Questa funzione aspetta che tutto il contenuto venga caricato
    window.addEventListener("DOMContentLoaded", function () {
        
        // Crea un array con tutti i form della pagina con classe 'form-delete'
      const forms = document.querySelectorAll(".form-delete");
    
        // Cicla tutti i form trovati
      for (const form of forms) {
            
            // Aggiunge un eventListener sul 'submit' di ogni form
        form.addEventListener("submit", function (e) {
                
                // Aggiunge un preventDefault, annullando il comportamento di base
          e.preventDefault();
            
                // Crea un alert e lo salva in una variabile
          /* const result = confirm("Sei sicuro di voler cancellare questo elemento?")
                
                // Se valido l'alert invoca la funzione submit sul form
          if (result) {
                form.submit();
          } */
    
        })
    
      }
    
    })