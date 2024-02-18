<?php
$query = "select username,description,dateadded from tblfeedback";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $testimonials[] = $row;
}

foreach ($testimonials as $key => $testimonial) {
    $activeClass = $key == 0 ? 'active' : '';
    echo '<div class="carousel-item ' . $activeClass . '">';
    echo '<h3>' . $testimonial['username'] . '</h3>';
    echo '<p>' . $testimonial['description'] . '</p>';
    echo '<p class="font-italic">' . date('F j, Y', strtotime($testimonial['dateadded'])) . '</p>';
    echo '</div>';
}
?>