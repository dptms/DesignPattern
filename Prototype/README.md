# 原型模式
> 与工厂模式作用类似，都是用来创建对象的，但是与工厂模式不同的是，原型模式是先创建好一个原型对象，然后通过clone原型对象来创建新的对象，这样就避免了类创建时重复的初始化操作。原型对象适用于大对象的创建，创建一个大对象需要很大的开销，如果每次new就会消耗很大，原型模式仅需内存拷贝即可。