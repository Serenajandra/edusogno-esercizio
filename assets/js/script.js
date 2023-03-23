
function validaRegistration(form) {
    // Verifico se il nome è stato inserito
    if (form.name.value == "") {
        alert("Inserisci il tuo nome");
        form.name.focus();
        return false;
    }
    
    // Verifico se il cognome è stato inserito
    if (form.surname.value == "") {
        alert("Inserisci il tuo cognome");
        form.surname.focus();
        return false;
    }
    
    // Verifico se l'email è stata inserita correttamente
    const email = form.email.value;
    const emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    if (!emailRegex.test(email)) {
        alert("Inserisci un indirizzo email valido");
        form.email.focus();
        return false;
    }

    // Verifico se la password è stata inserita correttamente
    if (form.password.value == "") {
        alert("Inserisci la tua password");
        form.password.focus();
        return false;
    } else if (form.password.value.length < 8 || !(/[A-Z]/.test(form.password.value)) || !(/[a-z]/.test(form.password.value))) {
      alert("La nuova password deve essere di almeno 8 caratteri e contenere almeno una lettera maiuscola, una lettera minuscola.");
      return false;
    }else{
    // Tutti i dati sono stati validati con successo
    return true;
    }
};


function validaLogin(form) {
    
    // Verifico se l'email è stata inserita correttamente
    const email = form.email.value;
    const emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    if (!emailRegex.test(email)) {
        alert("Inserisci un indirizzo email valido");
        form.email.focus();
        return false;
    }

    // Verifico se la password è stata inserita correttamente
    if (form.password.value == "") {
        alert("Inserisci la tua password");
        form.password.focus();
        return false;
    }
    
    // Tutti i dati sono corretti
    return true;
}

function validaChangePassword(form){
    const old_password = form.old_password.value;
    const new_password = form.new_password.value;
    const confirm_password = form.confirm_password.value;
     // Verifico se la vecchia password è stata inserita correttamente
     if (old_password  == "" || new_password == "" || confirm_password =="") {
        alert("Compila tutti i campi");
        // form.old_password.focus();
        return false;
    } else if (new_password.length < 8 || !(/[A-Z]/.test(new_password)) || !(/[a-z]/.test(new_password))) {
      alert("La nuova password deve essere di almeno 8 caratteri e contenere almeno una lettera maiuscola, una lettera minuscola.");
      return false;
    }else if (new_password != confirm_password) {
    alert("Le nuove password non coincidono" );
    return false;
    }else{
    // Tutti i dati sono corretti
    return true;
    }

    
}