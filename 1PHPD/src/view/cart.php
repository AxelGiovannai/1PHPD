<?php include 'header.php'; ?>

<?php include '../model/do_cart.php' ?>


<div class="mt-6 h-full rounded-lg bg-gray-800 p-6 shadow-md md:mt-0 md:self-stretch">
  <div class="mb-2 flex justify-between">
  </div>
  <hr class="my-4" />
  <div class="flex justify-between">
    <p class="text-lg text-gray-100 font-bold">Total</p>
    <div class="">
      <p class="mb-1 text-lg text-gray-100 font-bold"><?php echo $total; ?> $</p>
    </div>
  </div>
  <button class="mt-6 w-full rounded-md bg-bleu3 py-1.5 font-medium text-white hover:bg-bleu2">Check out</button>
</div>
</div>
</div>
</body>

<?php include 'footer.php'; ?>

<script src="../../public/js/deleteFromCart.js"></script>