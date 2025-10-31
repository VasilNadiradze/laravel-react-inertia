import { forwardRef, useImperativeHandle, useRef } from "react";

export default forwardRef(function SelectInput(
  { className = "", children, ...props },
  ref
) {
  const input = ref ? ref : useRef();

  useImperativeHandle(ref, () => ({
    focus: () => localRef.current?.focus(),
  }));

  return (
    <select
      {...props}
      className={
        "rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 " +
        className
      }
      ref={input}
    ></select>
  );
});
