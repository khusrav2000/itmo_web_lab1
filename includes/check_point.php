
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Проверить точку.
</button>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Проверка точки</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="check_point.php" method="get" id="pointInformation">
                    <h5 style="text-align: left; margin-left: 30px">Выбирайте координату X</h5>
                    <?php for ($i = -4; $i <= 4; ++$i): ?>
                        <div class="custom-control custom-checkbox mr-sm-2 x__coordinate__div">
                            <input type="checkbox" class="custom-control-input x__coordinate" id="idForXCoordinate<?php echo $i?>" name="number_<?php echo $i?>" value="number_<?php echo $i?>" >
                            <label class="custom-control-label" for="idForXCoordinate<?php echo $i?>" ><?php echo $i?></label>
                        </div>
                    <?php endfor; ?>
                    <br>
                    <div class="form-group y__coordinate__div">
                        <h5 style="float: left">Выбирайте координату Y</h5>
                        <input type="number" name="y__coordinate" id="yCoordinate" class="form-control" placeholder="{-3..5}">
                    </div>

                    <div class="form-group r__radius__div">
                        <h5 style="float: left">Выбирайте радиус R</h5>
                        <input type="number" name="r__radius" id="rRadius" class="form-control" placeholder="{2..5}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>
                        <button type="submit" class="btn btn-primary" disabled="disabled" id="idForCheckPoint">Проверить</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>