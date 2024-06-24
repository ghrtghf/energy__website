<?php

/** 
 * @var \App\Kernel\View\View $view
 * @var array<\App\Models\Cart> $carts
 * @var array<\App\Models\Station> $stations
 * @var array<\App\Models\Model> $models
 */

$total_count = 0;
$sum = 0;

if (isset($carts)) {

	foreach ($carts as $cart) {
		$total_count += $cart->count();
		$sum += $cart->sumItem();
	}
}

?>



<?php $view->component('start') ?>

<section class='cart'>
	<div class='wrapper'>
		<div class="cart__main">
			<div class="sidebar">
				<div class="sidebar__inner">
					<a href="./profile" class="sidebar__link sidebar__circle">
						<svg width="36" height="40" viewBox="0 0 36 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M9 9.09091C9 4.07015 13.0294 0 18 0C22.9705 0 27 4.07015 27 9.09091C27 14.1117 22.9705 18.1818 18 18.1818C13.0294 18.1818 9 14.1117 9 9.09091ZM18 3.63636C15.0176 3.63636 12.6 6.07845 12.6 9.09091C12.6 12.1034 15.0176 14.5455 18 14.5455C20.9824 14.5455 23.4 12.1034 23.4 9.09091C23.4 6.07845 20.9824 3.63636 18 3.63636Z" fill="black" />
							<path fill-rule="evenodd" clip-rule="evenodd" d="M0 38.1818C0 28.1404 8.05887 20 18 20C27.941 20 36 28.1404 36 38.1818V40H0V38.1818ZM3.7114 36.3636H32.2886C31.4028 29.1885 25.3433 23.6364 18 23.6364C10.6567 23.6364 4.59718 29.1885 3.7114 36.3636Z" fill="black" />
						</svg>
					</a>
					<a href="./history" class="sidebar__link sidebar__circle">
						<svg width="38" height="36" viewBox="0 0 38 36" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M19.95 0C13.3 0 7.41 3.6 4.37 9.09474L0 4.73684V17.0526H12.35L7.03 11.7474C9.5 7.01053 14.25 3.78947 19.95 3.78947C27.74 3.78947 34.2 10.2316 34.2 18C34.2 25.7684 27.74 32.2105 19.95 32.2105C13.68 32.2105 8.55 28.2316 6.46 22.7368H2.47C4.56 30.3158 11.59 36 19.95 36C30.02 36 38 27.8526 38 18C38 8.14737 29.83 0 19.95 0ZM17.1 9.47368V19.1368L26.03 24.4421L27.55 21.9789L19.95 17.4316V9.47368H17.1Z" fill="black" />
						</svg>
					</a>
					<a href="./cart" class="sidebar__link sidebar__active">
						<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M10.2 27.2C8.33 27.2 6.8 28.73 6.8 30.6C6.8 32.47 8.33 34 10.2 34C12.07 34 13.6 32.47 13.6 30.6C13.6 28.73 12.07 27.2 10.2 27.2ZM0 0V3.4H3.4L9.52 16.32L7.14 20.4C6.97 20.91 6.8 21.59 6.8 22.1C6.8 23.97 8.33 25.5 10.2 25.5H30.6V22.1H10.88C10.71 22.1 10.54 21.93 10.54 21.76V21.59L12.07 18.7H24.65C26.01 18.7 27.03 18.02 27.54 17L33.66 5.95C34 5.61 34 5.44 34 5.1C34 4.08 33.32 3.4 32.3 3.4H7.14L5.61 0H0ZM27.2 27.2C25.33 27.2 23.8 28.73 23.8 30.6C23.8 32.47 25.33 34 27.2 34C29.07 34 30.6 32.47 30.6 30.6C30.6 28.73 29.07 27.2 27.2 27.2Z" fill="black" />
						</svg>
					</a>
					<a href="./admin" class="sidebar__link sidebar__circle">
						<svg width="32" height="36" viewBox="0 0 32 36" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M7.99512 7.99513C7.99512 3.57955 11.5747 0 15.9902 0C20.4058 0 23.9854 3.57955 23.9854 7.99513C23.9854 12.4107 20.4058 15.9903 15.9902 15.9903C11.5747 15.9903 7.99512 12.4107 7.99512 7.99513ZM15.9902 3.19805C13.3408 3.19805 11.1932 5.34578 11.1932 7.99513C11.1932 10.6445 13.3408 12.7922 15.9902 12.7922C18.6397 12.7922 20.7873 10.6445 20.7873 7.99513C20.7873 5.34578 18.6397 3.19805 15.9902 3.19805Z" fill="black" />
							<path d="M3.29702 31.9805C4.0839 25.6703 9.46684 20.7873 15.9903 20.7873C18.6389 20.7873 21.095 21.5905 23.1344 22.9665L24.46 23.8607L26.2486 21.2095L24.9231 20.3153C22.3718 18.5941 19.2959 17.5893 15.9903 17.5893C7.15908 17.5893 0 24.7485 0 33.5796V35.1786H25.5844V31.9805H3.29702Z" fill="black" />
							<path d="M31.9766 20.7835L32 30.3776L28.8019 30.3853L28.7786 20.7912L31.9766 20.7835Z" fill="black" />
							<path d="M28.7821 31.9805H31.9961V35.1786H28.7821V31.9805Z" fill="black" />
						</svg>
					</a>
				</div>
			</div>
			<div class="cart__header">
				<div class="cart__items">
					<p>Товары</p>
				</div>
				<form action="/buy" method="post">
					<button class="cart__buy">
						<span>Оформить</span>
					</button>
				</form>
			</div>
			<div class="cart__inner">
				<div class="cart__content">
					<?php
					if (!empty($carts)) {
						foreach ($carts as $cart) { ?>
							<div class="cart__item">
								<div class="cart__about">
									<img src="<?= $storage->url($cart->image()) ?>" alt="">
									<div class="cart__name">
										<p><?php echo $cart->station() . ' ' . $cart->name() ?></p>
										<form action="deleteItem" method="post">
											<input type="hidden" name="cart_id" value="<?php echo $cart->id() ?>">
											<button>
												<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="32" height="32" rx="4" fill="white" />
													<path d="M22.4643 9.65625H19.706L18.5676 7.77197C18.2489 7.29308 17.7567 7 17.1942 7H13.8058C13.2433 7 12.721 7.29308 12.433 7.77197L11.294 9.65625H8.53571C8.23856 9.65625 8 9.89299 8 10.1875V10.7188C8 11.0143 8.23856 11.25 8.53571 11.25H9.07143V21.875C9.07143 23.0487 10.0307 24 11.2143 24H19.7857C20.9693 24 21.9286 23.0487 21.9286 21.875V11.25H22.4643C22.7623 11.25 23 11.0143 23 10.7188V10.1875C23 9.89299 22.7623 9.65625 22.4643 9.65625ZM13.7556 8.68938C13.7891 8.63127 13.856 8.59375 13.9263 8.59375H17.0737C17.1448 8.59375 17.2118 8.6311 17.2453 8.68921L17.8304 9.65625H13.1696L13.7556 8.68938ZM19.7857 22.4062H11.2143C10.9184 22.4062 10.6786 22.1684 10.6786 21.875V11.25H20.3214V21.875C20.3214 22.1672 20.0804 22.4062 19.7857 22.4062ZM15.5 20.8125C15.7961 20.8125 16.0357 20.5749 16.0357 20.2812V13.375C16.0357 13.0814 15.7961 12.8438 15.5 12.8438C15.2039 12.8438 14.9643 13.0828 14.9643 13.375V20.2812C14.9643 20.5734 15.2054 20.8125 15.5 20.8125ZM12.8214 20.8125C13.1161 20.8125 13.3571 20.5734 13.3571 20.2812V13.375C13.3571 13.0814 13.1175 12.8438 12.8214 12.8438C12.5253 12.8438 12.2857 13.0828 12.2857 13.375V20.2812C12.2857 20.5734 12.5268 20.8125 12.8214 20.8125ZM18.1786 20.8125C18.4747 20.8125 18.7143 20.5749 18.7143 20.2812V13.375C18.7143 13.0814 18.4747 12.8438 18.1786 12.8438C17.8825 12.8438 17.6429 13.0828 17.6429 13.375V20.2812C17.6429 20.5734 17.8839 20.8125 18.1786 20.8125Z" fill="black" />
												</svg>
											</button>
										</form>
									</div>
									<p class="cart__price">
										<?= $cart->price() ?><span>РУБ</span>
									</p>

									<div class="cart__counter" data-counter>
										<a href="/minusItem?cart_id=<?php echo $cart->id() ?>">
											<div class="cart__button counter-minus">
												<svg width="13" height="1" viewBox="0 0 13 1" fill="none" xmlns="http://www.w3.org/2000/svg">
													<line y1="0.5" x2="13" y2="0.5" stroke="black" />
												</svg>
											</div>
										</a>
										<input class="cart__input" type="text" value="<?= $cart->count() ?>" disabled>
										<a href="/plusItem?cart_id=<?php echo $cart->id() ?>">
											<div class="cart__button counter-plus">
												<svg class="svg-plus" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
													<line class="svg-plus" y1="6.5" x2="13" y2="6.5" stroke="black" />
													<line class="svg-plus" x1="6.5" x2="6.5" y2="13" stroke="black" />
												</svg>
											</div>
										</a>
									</div>
								</div>
							</div>
					<?php }
					} ?>
				</div>
				<div class="cart__result">
					<p>Ваша корзина</p>
					<div class="cart__total">
						<p>Товары</p>
						<p><?= $total_count ?></p>

					</div>
					<div class="cart__cost">
						<p>общая стоимость</p>
						<p><?= $sum ?>Р</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<?php $view->component('end') ?>