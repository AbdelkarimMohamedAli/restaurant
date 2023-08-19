<?php

namespace App\Http\Livewire;

use App\Models\Addon;
use App\Models\Category;
use App\Models\Item as ModelsItem;
use App\Models\Matrial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Nette\Utils\Random;
use RealRashid\SweetAlert\Facades\Alert;

class Item extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme='bootstrap';
    protected $listeners = [
        'getLatitudeForInput'
   ];
   //
   public $latitud;
   public function getLatitudeForInput($value)
   {
       if(!is_null($value))
           $this->latitud = $value;
   }

    public $formstatus=true;
    public $toggleModel=false;
    public $names,$discreption,$item_id,$price,$category=0,$discount,$discountType,$image,$imgurl,$isImage=false;
    public $variant,$option,$optionPrice,$inputstill='';
    public $variants=[],$addons_s=[],$matrial_s=[],$option_matrials=[];
    public $variant_id=0,$option_id=0;
    public $addonselect=false,$matrialSelect=false,$matrials_form='';
    public $search='',$Msearch='';
    public $opm_id=0,$opm_qty;
    
    protected $rules=[
        'names'=>'required',
        'image' => 'required|mimes:png,jpg,jpeg,csv,pdf|max:2048',
        'category'=>'required',
        'discreption'=>'required',
        'price'=>'required'
    ];
    public function createform() {
        $this->formstatus=true;
        $this->toggleModel='show';
        $this->isImage=true;
        $this->reseti();
    }
    public function closeform() {
        $this->toggleModel='';
    }
    // render Componenets
    public function render()
    {


        // if($this->image){    
        //     dd($this->image);
        // }
        if ($this->search){
        $addons= Addon::where('name', 'like', '%' . $this->search . '%')->get();
        }else{
        $addons=Addon::all();
        }
        if($this->Msearch){
            $matrials=Matrial::where('name', 'like', '%' . $this->Msearch . '%')->get();
        }else{
            $matrials=Matrial::all();
        }
        $categories=Category::all();
        $items=ModelsItem::query()->orderBy('updated_at','desc')->paginate(5);
        return view('livewire.item',[
            'items'=>$items,
            'addons'=>$addons,
            'categories'=>$categories,
            'matrials'=>$matrials
        ]);
        
    }
    public function update($prop){
        if ($prop == 'search') {
            $this->resetPage();
        }
    }
    // open and close addons dropdown
    public function addonSelectO(){
        $this->addonselect=true;
    }
    public function addonSelectC(){
        $this->addonselect=false;
    }
    // open and close matrials dropdown 
    public function matrialSelectO(){
        $this->matrialSelect=true;
    }
    public function matrialSelectC(){
        $this->matrialSelect=false;
    }
     // add& remove Addons //
    public function addAdons($id){
        $addone=Addon::query()->find($id);
        $addon=[
            'id'=>$addone->id,
            'name'=>$addone->name,
            'price'=>$addone->price,
        ];
        array_push($this->addons_s,$addon);
    }
    public function stillshow($id1,$id2){
        $this->variant_id=$id1;
        $this->option_id=$id2;
        $this->option_matrials= $this->variants[$id1]['array'][$id2]['matrials'];
        $this->matrials_form='show';
        // dd($this->option_matrials);
 
    }
    
    public function removeAddons($id){
        unset($this->addons_s[$id]);
    }
    // add& remove Matrial
    public function addMatrial($id){
        $matriale=Matrial::query()->find($id);
        $matrial=[
            'id'=>$matriale->id,
            'name'=>$matriale->name,
            'price'=>$matriale->price,
        ];
        array_push($this->matrial_s,$matrial);
    }
    public function removeMatrial($id){
        unset($this->matrial_s[$id]);
    }
    // add&remove varinat
    public function addVariants(){
        if ($this->variant){
            array_push($this->variants,['name'=>$this->variant,'array'=>[]]);  
        }
        
        // dd($this->variants);
        $this->variant='';
    }
    public function removeVarint($id){
        unset($this->variants[$id]);
    }
    public function addoptions($id){
        $data=[
            'name'=>$this->option,
            'price'=>$this->optionPrice,
            'matrials'=>array()
        ];
        array_push($this->variants[$id]['array'],$data);
        
    }
    public function removeoptions($id,$id2){
        unset($this->variants[$id]['array'][$id2]);
    }
    // add remove items
    public function reseti() {
        $this->names='';
        $this->category=0;
        $this->image='';
        $this->discount='';
        $this->discountType='';
        $this->price='';
        $this->addons_s=[];
        $this->variants=[];
        $this->matrial_s=[];
        $this->discreption='';
    }
    public function addItems(){
        
        $this->validate();
        // $this->imgurl = $this->image->getClientOriginalName();
        // $this->image->store('files', 'public');
        $imageName=Random::generate(10).'.'.$this->image->extension();
        $this->image->storeAs('image_uploads', $imageName);
        
        ModelsItem::create([
            'name'=>$this->names,
            'category_id'=>$this->category,
            'img'=>$imageName,
            'discount'=>$this->discount,
            'discount_type'=>$this->discountType,
            'user_id'=>Auth::user()->id,
            'price'=>$this->price,
            'addons'=>$this->addons_s,
            'variant'=>$this->variants,
            'matrials'=>$this->matrial_s,
            'description'=>$this->discreption,
        ]);
        
        session()->flash('message', 'تمت الاضافه بنجاح');
        $this->toggleModel='';
        $this->reseti();
    }
    public function updateItem($id){

        
        $item=ModelsItem::find($id);
        $item->name= $this->names;
        $item->category_id=$this->category;
        $item->discount=$this->discount;
        $item->discount_type=$this->discountType;
        $item->price=$this->price;
        $item->addons=$this->addons_s;
        $item->variant=$this->variants;
        $item->matrials=$this->matrial_s;
        $item->description=$this->discreption;
        // if(file_exists('uploads/image_uploads/'.$item->img)){
        //     unlink('uploads/image_uploads/'.$item->img);
        //     $imageName=Random::generate(10).'.'.$this->image->extension();
        //     $this->image->storeAs('image_uploads', $imageName);
        //     $item->img=$imageName;
        // }
        $item->save();
        // alert()->success('Title','Lorem Lorem Lorem');
        session()->flash('message', 'تمت التعديل بنجاح');
        $this->toggleModel='';
        $this->reseti();
    }
    public function deleteItem($id){
        $item=ModelsItem::find($id);
        if(file_exists('uploads/image_uploads/'.$item->img)){
            unlink('uploads/image_uploads/'.$item->img);
          }
        // unlink(public_path('image_uploads/'. $item->img));
        $item->delete();
        session()->flash('message', 'تمت الحذف بنجاح');
    }
    public function select($id){
        
        $item=ModelsItem::find($id);
        if($item){
            $this->names=$item->name;
            $this->category=$item->category_id;
            $this->image=$item->img;
            $this->discount=$item->discount;
            $this->discountType=$item->discount_type;
            $this->price=$item->price;
            $this->addons_s=$item->addons;
            $this->variants=$item->variant;
            $this->matrial_s=$item->matrials;
            $this->discreption=$item->description;
            $this->item_id=$item->id;
        }
        $this->formstatus=false;
        $this->toggleModel='show';
        $this->isImage=false;
    }
    public function select2($id){
        
        $item=ModelsItem::find($id);
        if($item){
            $this->names=$item->name;
            $this->item_id=$item->id;
        }
        $this->dispatchBrowserEvent('show-form',['modalId'=>'#form','actionModal'=>'show']);
    }
    public function stauts(){
        $this->isImage=true;
    }
    public function addoptionMatrial($id){
        $matrial=Matrial::query()->find($id);
        $matrialdata=[
            'id'=>$matrial->id,
            'name'=>$matrial->name,
            'price'=>$matrial->price,
            'qty'=>'',
        ];
        // $this->option_matrials
        array_push($this->option_matrials,$matrialdata);

    }
    public function open(){
        $this->dispatchBrowserEvent('canc-offcanvas',['modalId'=>'#form2','actionModal'=>'show']);
    }
    public function close_opm(){
        $this->matrials_form='';
    }
    public function addOPM(){
        $matrial=Matrial::find($this->opm_id);
        $data=[
            'id'=>$matrial->id,
            'name'=>$matrial->name,
            'price'=>$matrial->price,
            'unit'=>$matrial->unit->name,
            'qty'=>$this->opm_qty
        ];
        array_push($this->option_matrials,$data);
        // dd($this->option_matrials);
    }
    public function deleteOPM($id){
        unset($this->option_matrials[$id]);
    }
    public function saveOPM(){
       $this->variants[$this->variant_id]['array'][$this->option_id]['matrials']=$this->option_matrials;
        // $this->updateItem($this->item_id);
        if($this->formstatus){
            // ...
        }else{
        $item=ModelsItem::find($this->item_id);
        $item->variant=$this->variants;
        $item->save();
        }
        $this->toggleModel='show';
        $this->close_opm();
    }
}