<div>
    <div class="form-row align-items-center">
        <div class="col-12 col-sm-3 mb-2 mb-md-0">
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect1" wire:model="make">
                <option selected hidden>Select Make</option>
                @foreach($makes as $make)
                    <option value="{{$make->id}}">{{$make->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-sm-3 mb-2 mb-md-0">
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect2" wire:model="model">
                <option selected hidden>Select Model</option>
                @foreach($models as $model)
                    <option value="{{$model->id}}">{{$model->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-sm-3 mb-2 mb-md-0">
            <div id="inlineFormCustomSelect" class="col-sm-12">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Keyword" wire:model="keyword">
            </div>
        </div>
        <div class="col-12 col-sm-3 mb-2 mb-md-0">
            <button type="submit" class="dash-btn btn btn-primary ml-1 ml-sm-0" wire:click="send">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</div>
