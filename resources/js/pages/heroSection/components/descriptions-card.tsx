import {
    AlertDialog,
    AlertDialogAction,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
} from '@/components/ui/alert-dialog';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Dialog, DialogContent, DialogDescription, DialogFooter, DialogHeader, DialogTitle } from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { useForm, usePage } from '@inertiajs/react';
import { Edit, Loader2, Plus, Save, Trash2 } from 'lucide-react';
import { useEffect, useState } from 'react';
import { toast } from 'sonner';

type HeroSectionType = {
    descriptions: { id: number; description: string }[];
};

type PageProps = {
    heroSection: HeroSectionType;
};

export default function DescriptionsCard() {
    const { heroSection } = usePage<PageProps>().props;

    const [isAddDialogOpen, setIsAddDialogOpen] = useState(false);
    const [isEditDialogOpen, setIsEditDialogOpen] = useState(false);
    const [isDeleteDialogOpen, setIsDeleteDialogOpen] = useState(false);
    const [editingIndex, setEditingIndex] = useState<number | null>(null);
    const [newDescription, setNewDescription] = useState('');
    const [operationType, setOperationType] = useState<'create' | 'update' | 'delete' | null>(null);

    const {
        data,
        setData,
        post,
        delete: destroy,
        put,
        processing,
        errors,
        reset,
        setError,
        clearErrors,
    } = useForm({
        description: '',
    });

    useEffect(() => {
        if (!isAddDialogOpen) {
            reset('description');
            clearErrors();
        }
    }, [isAddDialogOpen, reset, clearErrors]);

    // open add description dialog
    const openAddDialog = () => {
        setNewDescription('');
        setIsAddDialogOpen(true);
    };

    // open edit description dialog
    const openEditDialog = (index: number) => {
        setEditingIndex(index);
        setNewDescription(heroSection?.descriptions?.find((d: { id: number }) => d?.id === index)?.description || '');
        setIsEditDialogOpen(true);
        clearErrors();
    };

    // open delete description dialog
    const openDeleteDialog = (index: number) => {
        setEditingIndex(index);
        setNewDescription(heroSection?.descriptions?.find((t: { id: number }) => t?.id === index)?.description || '');
        setIsDeleteDialogOpen(true);
    };

    // add description
    const addTitle = () => {
        if (data.description.trim()) {
            setOperationType('create');
            submitCreate();
        } else {
            setError('description', 'Title is required');
        }
    };

    // edit description
    const editTitle = () => {
        if (newDescription.trim() && editingIndex !== null) {
            setOperationType('update');
            submitEdite(editingIndex);
        } else {
            toast.error('Title cannot be empty');
        }
    };

    const submitEdite = (id: number) => {
        put(route('dashboard.hero-section.update', { id, newDescription }), {
            // title: newDescription,
            preserveScroll: true,
            onSuccess: () => {
                toast.success('Title edited successfully.');
                setIsEditDialogOpen(false);
                setEditingIndex(null);
                setOperationType(null);
            },
            onError: (errors) => {
                if (errors.title) {
                    toast.error(errors.title);
                } else {
                    toast.error('An error occurred while editing. Please try again.');
                }
                setOperationType(null);
            },
        });
    };

    // delete title
    const deleteTitle = () => {
        if (editingIndex !== null) {
            setOperationType('delete');
            submitDelete(editingIndex);
        }
    };

    // submit delete description
    const submitDelete = (id: number) => {
        destroy(route('dashboard.hero-section.destroy', { id, type: 'description' }), {
            preserveScroll: true,
            onSuccess: () => {
                toast.success('Title deleted successfully.');
                setIsDeleteDialogOpen(false);
                setEditingIndex(null);
                setOperationType(null);
            },
            onError: (errors) => {
                if (errors.message) {
                    toast.error(errors.message);
                } else {
                    toast.error('An error occurred while deleting. Please try again.');
                }
                setOperationType(null);
            },
        });
    };

    // submit create title
    const submitCreate = () => {
        post(route('dashboard.hero-section.store'), {
            preserveScroll: true,
            onSuccess: () => {
                toast.success('Title has been created.');
                setIsAddDialogOpen(false);
                setOperationType(null);
            },
            onError: (errors) => {
                if (errors.title) {
                    toast.error(errors.title);
                } else {
                    toast.error('An error occurred while saving. Please try again.');
                }
                setOperationType(null);
            },
        });
    };

    // دالة للمساعدة في عرض أيقونة التحميل
    const renderLoadingIcon = () => <Loader2 className="h-4 w-4 animate-spin" />;

    // منع إغلاق النافذة أثناء التحميل
    const handleOpenChange = (open: boolean, type: 'add' | 'edit' | 'delete') => {
        if (processing) return;

        if (type === 'add') setIsAddDialogOpen(open);
        if (type === 'edit') setIsEditDialogOpen(open);
        if (type === 'delete') setIsDeleteDialogOpen(open);

        if (!open) {
            clearErrors();
            setEditingIndex(null);
        }
    };

    return (
        <div className="space-y-6">
            <Card>
                <CardHeader className="flex flex-row items-center justify-between">
                    <CardTitle>Description</CardTitle>
                    <Button onClick={openAddDialog} size="sm" className="flex items-center gap-1" disabled={processing && operationType === 'create'}>
                        {processing && operationType === 'create' ? renderLoadingIcon() : <Plus size={16} />}
                        Add Description
                    </Button>
                </CardHeader>

                <CardContent className="space-y-4">
                    {heroSection?.descriptions?.map((description: { id: number; description: string }) => (
                        <div key={description?.id} className="flex items-center gap-2">
                            <Input value={description?.description} readOnly placeholder={`Title ${description?.id}`} className="flex-1" />
                            <Button
                                variant="outline"
                                size="icon"
                                onClick={() => openEditDialog(description?.id)}
                                disabled={processing && operationType === 'update' && editingIndex === description?.id}
                            >
                                {processing && operationType === 'update' && editingIndex === description?.id ? (
                                    renderLoadingIcon()
                                ) : (
                                    <Edit size={16} />
                                )}
                            </Button>
                            <Button
                                variant="destructive"
                                size="icon"
                                onClick={() => openDeleteDialog(description?.id)}
                                disabled={
                                    heroSection?.descriptions?.length <= 1 ||
                                    (processing && operationType === 'delete' && editingIndex === description.id)
                                }
                            >
                                {processing && operationType === 'delete' && editingIndex === description.id ? (
                                    renderLoadingIcon()
                                ) : (
                                    <Trash2 size={16} />
                                )}
                            </Button>
                        </div>
                    ))}

                    {heroSection?.descriptions?.length === 0 && <div className="py-6 text-center text-gray-500">No titles added yet.</div>}
                </CardContent>
            </Card>

            {/* نافذة إضافة عنوان جديد */}
            <Dialog open={isAddDialogOpen} onOpenChange={(open) => handleOpenChange(open, 'add')}>
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>Add a new title</DialogTitle>
                        <DialogDescription>Enter the new title you want to add to the main section.</DialogDescription>
                    </DialogHeader>
                    <div className="space-y-2 py-4">
                        <div>
                            <Label htmlFor="title" className="sr-only">
                                Title
                            </Label>
                            <Input
                                id="title"
                                value={data.description}
                                onChange={(e) => {
                                    setData('description', e.target.value);
                                    if (e.target.value.trim()) clearErrors('description');
                                }}
                                name="title"
                                placeholder="Enter the new Title"
                                disabled={processing && operationType === 'create'}
                                className={errors.description ? 'border-destructive' : ''}
                            />
                        </div>
                        {errors.description && <p className="text-sm text-destructive">{errors.description}</p>}
                    </div>
                    <DialogFooter>
                        <Button variant="outline" onClick={() => handleOpenChange(false, 'add')} disabled={processing && operationType === 'create'}>
                            Cancel
                        </Button>
                        <Button onClick={addTitle} disabled={!data.description?.trim() || (processing && operationType === 'create')}>
                            {processing && operationType === 'create' ? (
                                <>
                                    {renderLoadingIcon()}
                                    <span className="ml-2">Adding...</span>
                                </>
                            ) : (
                                <>
                                    <Plus size={16} className="ml-1" />
                                    Add
                                </>
                            )}
                        </Button>
                    </DialogFooter>
                </DialogContent>
            </Dialog>

            {/* نافذة تعديل عنوان */}
            <Dialog open={isEditDialogOpen} onOpenChange={(open) => handleOpenChange(open, 'edit')}>
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>Edit title</DialogTitle>
                        <DialogDescription>Edit the specified title.</DialogDescription>
                    </DialogHeader>
                    <div className="py-4">
                        <Input
                            value={newDescription}
                            name="new_title"
                            onChange={(e) => setNewDescription(e.target.value)}
                            placeholder="Edit the title"
                            disabled={processing && operationType === 'update'}
                        />
                    </div>
                    <DialogFooter>
                        <Button variant="outline" onClick={() => handleOpenChange(false, 'edit')} disabled={processing && operationType === 'update'}>
                            Cancel
                        </Button>
                        <Button onClick={editTitle} disabled={!newDescription.trim() || (processing && operationType === 'update')}>
                            {processing && operationType === 'update' ? (
                                <>
                                    {renderLoadingIcon()}
                                    <span className="ml-2">Saving...</span>
                                </>
                            ) : (
                                <>
                                    <Save size={16} className="ml-1" />
                                    Save changes
                                </>
                            )}
                        </Button>
                    </DialogFooter>
                </DialogContent>
            </Dialog>

            {/* نافذة تأكيد الحذف */}
            <AlertDialog open={isDeleteDialogOpen} onOpenChange={(open) => handleOpenChange(open, 'delete')}>
                <AlertDialogContent>
                    <AlertDialogHeader>
                        <AlertDialogTitle>Are you sure you want to delete this Title "{newDescription}"?</AlertDialogTitle>
                        <AlertDialogDescription>This action is irreversible. The title will be permanently deleted.</AlertDialogDescription>
                    </AlertDialogHeader>
                    <AlertDialogFooter>
                        <AlertDialogCancel disabled={processing && operationType === 'delete'}>Cancel</AlertDialogCancel>
                        <AlertDialogAction
                            onClick={deleteTitle}
                            className="bg-destructive text-destructive-foreground"
                            disabled={processing && operationType === 'delete'}
                        >
                            {processing && operationType === 'delete' ? (
                                <>
                                    {renderLoadingIcon()}
                                    <span className="ml-2">Deleting...</span>
                                </>
                            ) : (
                                <>
                                    <Trash2 size={16} className="ml-1" />
                                    Delete
                                </>
                            )}
                        </AlertDialogAction>
                    </AlertDialogFooter>
                </AlertDialogContent>
            </AlertDialog>
        </div>
    );
}
