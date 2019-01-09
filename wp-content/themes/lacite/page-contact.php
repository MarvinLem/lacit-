<?php get_header(); ?>
<main>
    <section class="formulaire">
        <h2>Vous avez une question ou une demande ?</h2>
        <form method="POST" action="#">
            <label for="email">Votre email</label>
            <input type="text" id="email" name="email">
            <label for="name">Votre nom</label>
            <input type="text" id="name" name="name">
            <label for="request">Votre requète</label>
            <input type="text" id="request" name="request">
            <label for="message">Votre message</label>
            <textarea id="message" name="message"></textarea>
            <input type="submit" value="Envoyer">
        </form>
    </section>
    <aside class="contact">
        <h3>Informations de contact</h3>
        <p>
            Vous pouvez aussi nous contacter avec
        </p>
        <ul>
            <li>Notre adresse email:</li>
            <li class="light">- Adresse email de l'école</li>
            <li>Notre numéro de téléphone:</li>
            <li class="light">- Numéro de telephone de l'école</li>
        </ul>
    </aside>
</main>
<?php get_footer(); ?>