<?php

namespace App\Http\Livewire;

use App\Models\categoriesModel;
use App\Models\City;
use App\Models\propertiesAttachmentsModel;
use App\Models\propertiesModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProperties extends Component
{


    use WithFileUploads;

    public $listeners = ['setPropertyCoordinates' => 'getCoordinates'];

    public $categories;
    public $cities;

    public $propertyId;
    public $property;

    public $form = [
        'office_id' => '',
        'category' => '',
        'paymentType' => '',
        'title' => '',
        'description' => '',
        'area' => '',
        'city' => '',
        'district' => '',
        'street' => '',
        'latitude' => '',
        'longitude' => '',
        'ownerName' => '',
        'roomsNum' => '',
        'kitchensNum' => '',
        'mobileNumber' => '',
        'hasWhatsapp' => '',
        'hasElevator' => '',
        'hasPool' => '',
        'hasGarage' => '',
        'hasYard' => '',
    ];

    public $images = [];
    public $uploadedImages = [];

    // error messages
    protected $messages = [
        'form.category.required' => 'القسم مطلوب',
        'form.category.exists' => 'القسم غير موجود',
        'form.paymentType.required' => 'طريقة الشراء مطلوبه',
        'form.paymentType.in' => ' عفوًا هناك خطأ في طريقة الشراء',
        'form.title.required' => 'العنوان مطلوب',
        'form.title.max' => 'العنوان 255 احرف او ارقام كحد أقصى',
        'form.title.regex' => 'العنوان يكون احرف و ارقام  عربيه فقط',
        'form.description.required' => 'الوصف مطلوب',
        'form.description.regex' => 'الوصف يكون احرف و ارقام عربيه  فقط',
        'form.city.required' => 'المدينة مطلوبه',
        'form.city.exists' => 'المدينة غير موجوده',
        'form.city.numeric' => 'عفوًا هناك خطأ في اختيار المدينة',
        'form.area.required' => 'المساحة مطلوبه',
        'form.area.numeric' => 'المساحة ارقام فقط',
        'form.area.between' => 'المساحة 0 - 999999 متر مربع كحد أقصى',
        'form.latitude.required' => 'موقع العقار على الخارطة مطلوب',
        'form.longitude.required' => 'موقع العقار على الخارطة مطلوب',
        'form.street.regex' => 'اسم الشارع بالعربي فقط',
        'form.district.regex' => 'اسم الحي بالعربي فقط',
        'form.street.max' => 'اسم الشارع 300 حرف كحد أقصى',
        'form.district.max' => 'اسم الحي 300 حرف كحد أقصى',
        'form.ownerName.regex' => 'اسم المالك بالعربي فقط',
        'form.ownerName.max' => 'اسم المالك 300 حرف كحد أقصى',
        'form.street.required' => 'اسم الشارع مطلوب',
        'form.district.required' => 'اسم الحي مطلوب',
        'form.ownerName.required' => 'اسم المالك مطلوب',
        'form.roomsNum.required_if' => 'عدد الغرف مطلوب',
        'form.roomsNum.regex' => 'عدد الغرف ارقام فقط',
        'form.kitchensNum.required_if' => 'عدد المطابخ مطلوب',
        'form.mobileNumber.required' => 'رقم الجوال مطلوب',
        'form.mobileNumber.regex' => 'صيغة الجوال غير صحيحة',
        'form.kitchensNum.regex' => 'عدد المطابخ ارقام فقط',
        'form.hasWhatsapp.required' => 'يجب الأجابة',
        'form.hasWhatsapp.in' => 'عفوُا حدث خطأ',
        'form.hasElevator.in' => 'عفوُا حدث خطأ',
        'form.hasPool.in' => 'عفوُا حدث خطأ',
        'form.hasGarage.in' => 'عفوُا حدث خطأ',
        'form.hasYard.in' => 'عفوُا حدث خطأ',
        'form.hasElevator.required_if' => 'يجب الأجابة',
        'form.hasPool.required_if' => 'يجب الأجابة',
        'form.hasGarage.required_if' => 'يجب الأجابة',
        'form.hasYard.required_if' => 'يجب الأجابة',
        'uploadedImages.*.mimes' => 'عفوًا الصيغة غير مسموح بها , فقط jpg,jpeg,png',
        'uploadedImages.*.max' => 'حجم الصورة غير مسموح به , 10 ميقا كحد أقصى',
        'uploadedImages.*.image' => 'ملف المرفق يجب ان يكون صورة فقط',
    ];

    public function mount($id)
    {
        if (propertiesModel::where('id', $id)->exists() && propertiesModel::where('id', $id)->first()->office_id == Auth::user()->office_id) {
            $this->propertyId = $id;
            $this->property = propertiesModel::where('id', $this->propertyId)->first()->toArray();
            $this->images = propertiesAttachmentsModel::where('property_id', $this->propertyId)->get()->toArray();
            $this->categories = categoriesModel::get()->toArray();
            $this->cities = City::get()->toArray();
            $this->form = $this->property;
        } else {
            return redirect()->to(route('properties'));
        }

    }

    public function update()
    {
        $this->dispatchBrowserEvent('inputChecker');
        $this->form['office_id'] = Auth::user()->office_id;
        $this->validate([
            'form.category' => 'required|exists:categories,id',
            'form.paymentType' => 'required|in:0,1',
            'form.title' => 'required|max:255|regex:/^[ء-ي0-9 ]+$/u',
            'form.description' => 'required|regex:/^[ء-ي0-9 ]+$/u',
            'form.city' => 'required|exists:cities,id|numeric',
            'form.area' => 'required|numeric|between:0.00,999999.999999',
            'form.latitude' => 'required',
            'form.longitude' => 'required',
            'form.district' => 'required|max:300|regex:/^[ء-ي ]+$/u',
            'form.street' => 'required|max:300|regex:/^[ء-ي ]+$/u',
            'form.ownerName' => 'required|max:300|regex:/^[ء-ي ]+$/u',
            'form.mobileNumber' => 'required|regex:/^[0-9]+$/u',
            'form.hasWhatsapp' => 'required|in:0,1',
            'form.roomsNum' => 'required_if:form.category,=,10,11,13,14,15,17',
            'form.kitchensNum' => 'required_if:form.category,=,10,11,13,14,15,17',
            'form.hasElevator' => 'required_if:form.category,=,10,11,13,14,15,17|in:0,1',
            'form.hasPool' => 'required_if:form.category,=,10,11,13,14,15,17|in:0,1',
            'form.hasGarage' => 'required_if:form.category,=,10,11,13,14,15,17|in:0,1',
            'form.hasYard' => 'required_if:form.category,=,10,11,13,14,15,17|in:0,1',
            'uploadedImages.*' => 'image|mimes:jpeg,jpg,png|max:10240'
        ]);

        propertiesModel::where('id', $this->propertyId)->update([
            'office_id' => $this->form['office_id'],
            'category' => $this->form['category'],
            'paymentType' => $this->form['paymentType'],
            'title' => $this->form['title'],
            'description' => $this->form['description'],
            'city' => $this->form['city'],
            'area' => $this->form['area'],
            'latitude' => $this->form['latitude'],
            'longitude' => $this->form['longitude'],
            'district' => $this->form['district'],
            'street' => $this->form['street'],
            'ownerName' => $this->form['ownerName'],
            'roomsNum' => ($this->form['roomsNum'] == null || $this->form['category'] == 12 || $this->form['category'] == 16  ? 0 : $this->form['roomsNum']),
            'kitchensNum' => ($this->form['kitchensNum'] == null || $this->form['category'] == 12 || $this->form['category'] == 16 ? 0 : $this->form['kitchensNum']),
            'bathroomNum' => ($this->form['bathroomNum'] == null || $this->form['category'] == 12 || $this->form['category'] == 16 ? 0 : $this->form['bathroomNum']),
            'floorsNum' => ($this->form['floorsNum'] == null || $this->form['category'] == 12 || $this->form['category'] == 16 ? 0 : $this->form['floorsNum']),
            'mobileNumber' => $this->form['mobileNumber'],
            'hasWhatsapp' => $this->form['hasWhatsapp'],
            'hasElevator' => ($this->form['hasElevator'] == null || $this->form['category'] == 12 || $this->form['category'] == 16 ? 0 : $this->form['hasElevator']),
            'hasPool' => ($this->form['hasPool'] == null || $this->form['category'] == 12 || $this->form['category'] == 16 ? 0 : $this->form['hasPool']),
            'hasGarage' => ($this->form['hasGarage'] == null || $this->form['category'] == 12 || $this->form['category'] == 16 ? 0 : $this->form['hasGarage']),
            'hasYard' => ($this->form['hasYard'] == null || $this->form['category'] == 12 || $this->form['category'] == 16 ? 0 : $this->form['hasYard']),
        ]);
        foreach ($this->uploadedImages as $key => $image) {
            $this->uploadedImages[$key] = $image->store('images', 'public');
            propertiesAttachmentsModel::where('property_id', $this->propertyId)->Create([
                'image' => $this->uploadedImages[$key],
                'property_id' => $this->propertyId
            ]);
        }
        $this->dispatchBrowserEvent('swal:toast-alert',
            [
                'icon' => 'success',
                'title' => 'تم تعديل العقار :)',
                'timer' => 2500,
            ]
        );
        $this->images = propertiesAttachmentsModel::where('property_id', $this->propertyId)->get()->toArray();
        $this->property = propertiesModel::where('id', $this->propertyId)->first()->toArray();
    }

    public function getCoordinates($coordinates)
    {
        $this->dispatchBrowserEvent('inputChecker');
        $this->form['latitude'] = $coordinates['lat'];
        $this->form['longitude'] = $coordinates['lng'];
    }

    public function imageDelete($id = 0)
    {
        $this->dispatchBrowserEvent('inputChecker');
        if (propertiesAttachmentsModel::where(['id' => $id, 'property_id' => $this->propertyId])->exists()) {
            if (propertiesAttachmentsModel::where('property_id', $this->propertyId)->count() != 1) {
                propertiesAttachmentsModel::where([
                    'id' => $id,
                    'property_id' => $this->propertyId
                ])->delete();
                $this->images = propertiesAttachmentsModel::where('property_id', $this->propertyId)->get()->toArray();
                $this->dispatchBrowserEvent('swal:toast-alert',
                    [
                        'icon' => 'success',
                        'title' => 'تم حذف الصورة :)',
                        'timer' => 2500,
                    ]
                );
            } else {
                $this->dispatchBrowserEvent('swal:alert',
                    [
                        'icon' => 'warning',
                        'title' => 'عفوًا لا يمكنك فعل ذلك',
                        'text' => 'يجب عليك رفع صورة قبل حذف اخر صورة للعقار',
                        'confirmButtonText' => 'حسنًا',
                    ]
                );
            }
        } else {
            $this->dispatchBrowserEvent('swal:toast-alert',
                [
                    'icon' => 'error',
                    'title' => 'عفوًا حدث خطأ :(',
                    'timer' => 2500,
                ]
            );
        }

    }

    public function render()
    {
        return view('livewire.dashboard.user.edit-properties')->extends('livewire.dashboard.layouts.app');
    }
}
