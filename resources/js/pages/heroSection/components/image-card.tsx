import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { useForm, usePage } from '@inertiajs/react';
import { Upload } from 'lucide-react';
import { useRef } from 'react';
import { toast } from 'sonner';

type HeroSectionType = { imagePath: string | null };
type PageProps = { heroSection: HeroSectionType };

export default function ImageCard() {
    const { heroSection } = usePage<PageProps>().props;
    const fileRef = useRef<HTMLInputElement>(null);

    /* useForm: أضف _method = 'put' وأرسل الملف داخل imagePath */
    const { data, setData, post, processing, errors, reset } = useForm<{
        imagePath: File | null;
        _method: 'put';
    }>({
        imagePath: null,
        _method: 'put',
    });

    const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const file = e.target.files?.[0];
        if (file) setData('imagePath', file);
    };

    const handleSubmit = () => {
        if (!data.imagePath) return toast.error('Please choose an image.');

        post(route('dashboard.hero-section.update', { id: 1 }), {
            forceFormData: true, // ضروري للملفات
            preserveScroll: true,
            onSuccess: () => {
                toast.success('Image uploaded.');
                reset(); // يصفّر imagePath و _method
                if (fileRef.current) fileRef.current.value = '';
            },
            onError: () => toast.error('Upload failed.'),
        });
    };

    return (
        <Card>
            <CardHeader>
                <CardTitle>Image</CardTitle>
            </CardHeader>

            <CardContent className="space-y-4">
                <div className="flex justify-center">
                    {heroSection.imagePath ? (
                        <img src={`/storage/${heroSection.imagePath}`} alt="Hero" className="h-64 w-64 rounded-lg object-cover" />
                    ) : (
                        <div className="flex h-64 w-64 items-center justify-center rounded-lg bg-gray-100">No image</div>
                    )}
                </div>

                <div className="flex flex-col items-center gap-3">
                    {/* مُنتقِي الملف */}
                    <input ref={fileRef} id="image-upload" type="file" accept="image/*" onChange={handleChange} />
                    <label htmlFor="image-upload">
                        <Button variant="outline" className="flex items-center gap-2">
                            <Upload size={16} />
                            Choose Image
                        </Button>
                    </label>

                    <Button onClick={handleSubmit} disabled={processing || !data.imagePath} className="w-40">
                        {processing ? 'Uploading…' : 'Save'}
                    </Button>

                    {errors.imagePath && <span className="text-sm text-red-600">{errors.imagePath}</span>}
                </div>
            </CardContent>
        </Card>
    );
}

// import { Button } from '@/components/ui/button';
// import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
// import { useForm, usePage } from '@inertiajs/react';
// import { Upload } from 'lucide-react';
// import { useRef } from 'react';
// import { toast } from 'sonner';

// type HeroSectionType = { imagePath: string | null };
// type PageProps = { heroSection: HeroSectionType };

// export default function ImageCard() {
//     const { heroSection } = usePage<PageProps>().props;
//     const fileRef = useRef<HTMLInputElement>(null);

//     const { data, setData, post, put, processing, errors, reset } = useForm<{
//         imagePath: File | null;
//     }>({
//         imagePath: null,
//     });

//     /* معالجة اختيار الملف */
//     const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
//         if (e.target.files && e.target?.files?.[0]) {
//             setData('imagePath', e.target?.files?.[0]);
//         }
//     };

//     /* إرسال النموذج */
//     const handleSubmit = () => {
//         if (!data.imagePath) {
//             toast.error('Please choose an image.');
//             return;
//         }

//         put(route('dashboard.hero-section.update', { id: 1, imagePath: fileRef.current.value }), {
//             preserveScroll: true,
//             forceFormData: true, // مهم لرفع الملفات
//             onSuccess: () => {
//                 toast.success('Image uploaded.');
//                 reset();
//                 if (fileRef.current) {
//                     fileRef.current.value = '';
//                 }
//             },
//             onError: () => {
//                 toast.error('Upload failed.');
//             },
//         });
//     };

//     return (
//         <Card>
//             <CardHeader>
//                 <CardTitle>Image</CardTitle>
//             </CardHeader>

//             <CardContent className="space-y-4">
//                 <div className="flex justify-center">
//                     {heroSection.imagePath ? (
//                         <img src={`${heroSection.imagePath}`} alt="Hero" className="h-64 w-64 rounded-lg object-cover" />
//                     ) : (
//                         <div className="flex h-64 w-64 items-center justify-center rounded-lg bg-gray-100">No image</div>
//                     )}
//                 </div>

//                 <div className="flex flex-col items-center gap-3">
//                     <label htmlFor="image-upload">
//                         <input ref={fileRef} id="image-upload" name="" type="file" accept="image/*" onChange={handleChange} />
//                         <Button variant="outline" className="flex items-center gap-2">
//                             <Upload size={16} />
//                             Choose Image
//                         </Button>
//                     </label>

//                     <Button onClick={handleSubmit} disabled={processing || !data.imagePath} className="w-40">
//                         {processing ? 'Uploading…' : 'Save'}
//                     </Button>

//                     {/* إظهار أخطاء التحقق إن وُجدت */}
//                     {errors.imagePath && <span className="text-sm text-red-600">{errors.imagePath}</span>}
//                 </div>
//             </CardContent>
//         </Card>
//     );
// }
