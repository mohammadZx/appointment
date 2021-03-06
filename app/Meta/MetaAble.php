<?php
namespace App\Meta;

trait MetaAble{

    public function meta(){
        return $this->morphMany('App\Models\MetaData',  'obj');
    }


    public function setMeta($key , $value = null, $parentID = 0, $updateData = false, $isChild = false){
        $patternForCreate = ['meta_key' => $key];
        if($isChild) $patternForCreate = ['meta_key' => $key, 'parent_id' => $parentID];
        if($updateData){
            $meta =  $this->meta()->updateOrCreate(
                $patternForCreate,
                [
                    'meta_key' => $key,
                    'meta_value' => $value,
                    'parent_id' => $parentID
                ]
            );
        }else{
            $meta =  $this->meta()->create([
                'meta_key' => $key,
                'meta_value' => $value,
                'parent_id' => $parentID
            ]);
        }
         
         return $meta;
    }

    public function get_meta($name, $single = false){
        $query = null;
        if(is_integer($name))
            $query = $this->meta()->where('id', $name);
        elseif(is_string($name))
            $query = $this->meta()->where('meta_key', $name);
        elseif(is_array($name))
            $query = $this->meta()->whereIn('id', $name)->orWhereIn('name', $name);
        
        if($single) return $query->first();
        return $query->get();

    }
    
    public function getMeta($name, $single = false){
        $query = null;
        if(is_integer($name))
            $query = $this->meta()->where('id', $name);
        elseif(is_string($name))
            $query = $this->meta()->where('meta_key', $name);
        elseif(is_array($name))
            $query = $this->meta()->whereIn('id', $name)->orWhereIn('meta_key', $name);
        if($single){
            if($query->count() > 0){
                return $query->first()->meta_value;
            }
            return false;
        }
        return $query->get();
    }
}