<?php
class VuePaiement extends VueGenerique {
public function success(){
    ?>
    <section>
        <p>
            We appreciate your business! If you have any questions, please email
            <a href="mailto:commande@example.com">commande@example.com</a>.
        </p>
    </section>
    <?php
}
public function cancel(){
    ?>
    <section>
        <p>Forgot to add something to your cart? Shop around then come back to pay!</p>
    </section>
    <?php
    }
}